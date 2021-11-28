<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Payment;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
