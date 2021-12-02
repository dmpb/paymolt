<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Payment;
use App\Models\PaymentLink;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = $request->user();
        $payments = $user->payments()->paginate();

        return Inertia::render('Payments/Index', [
            'payments'  => $payments,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(PaymentLink $paymentLink)
    {
        $seller = $paymentLink->user;

        $sellerPublicKey = $seller->settings['culqi_development']['public_key'];

        return Inertia::render('Payments/Create', [
            'seller'            => $seller,
            'sellerPublicKey'   => $sellerPublicKey,
            'paymentLink'       => $paymentLink,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, PaymentLink $paymentLink)
    {
        // Validar request
        $policy_settings = ['phone_number', 'address', 'name'];
        $validate = collect(['token', 'amount', 'currency', 'client.email']);

        $validation = collect([
            'token'     => ['required', 'string', 'max:255'],
            'client.email'          => ['required', 'string', 'email'],
            'client.phone_number'   => ['required', 'string', 'max:255'],
            'client.address'        => ['required', 'string', 'max:255'],
            'client.name'           => ['required', 'string', 'max:255'],
        ]);

        foreach ($policy_settings as $value) {
            if ($paymentLink->policy_settings["${value}_required"]) {
                $validate->push("client.${value}");
            }
        }

        $validation_filtered = $validation->only($validate->all());

        $request->validate($validation_filtered->all());

        // Crear cargo
        $seller = $paymentLink->user;
        $private_key_culqi = decrypt($seller->settings['culqi_development']['private_key']);
        $amount = strval($paymentLink->amount * 100);

        $response = Http::withToken($private_key_culqi)->post('https://api.culqi.com/v2/charges', [
            'amount'            => $amount,
            'currency_code'     => $paymentLink->currency,
            'email'             => $request->client['email'],
            'source_id'         => $request->token,
        ]);

        if ($response->successful()) {
            return Redirect::route('payments.create', ['paymentLink' => $paymentLink])->with('success', "Su compra ha sido exitosa.");
        } else {
            $response = $response->json();

            return Redirect::route('payments.create', ['paymentLink' => $paymentLink])->with('error', $response['user_message']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment, Request $request)
    {
        $api_url = Str::replaceFirst(
            ':charge',
            $payment->charge_culqi_id,
            "https://api.culqi.com/v2/charges/:charge"
        );
        $api_private_key = decrypt($request->user()->settings['culqi_development']['private_key']);

        $culqi_source = Http::withToken($api_private_key)->get($api_url);

        if ($culqi_source->successful()) {
            return Inertia::render('Payments/Show', [
                'payment'       => $payment,
                'culqiSource'    => $culqi_source->json(),
            ]);
        } else {
            abort(404);
        }
    }
}
