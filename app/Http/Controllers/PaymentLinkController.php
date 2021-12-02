<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\PaymentLink;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PaymentLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = $request->user();
        $paymentLinks = $user->paymentLinks()->orderBy('created_at', 'desc')->paginate();

        return Inertia::render('PaymentLinks/Index', [
            'paymentLinks'  => $paymentLinks
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('PaymentLinks/Create', []);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'amount'        => ['required', 'numeric', 'min:1', 'max:2000'],
            'description'   => ['nullable', 'string', 'max:500'],
            'policy_settings.email_required'          => ['required', 'boolean'],
            'policy_settings.phone_number_required'   => ['required', 'boolean'],
            'policy_settings.address_required'        => ['required', 'boolean'],
            'policy_settings.name_required'           => ['required', 'boolean'],
        ]);

        $request->user()->paymentLinks()->create([
            'code'          => Str::uuid(),
            'currency'      => 'PEN',
            'amount'        => $request->amount,
            'description'   => $request->description,
            'policy_settings->email_required'            => true,
            'policy_settings->phone_number_required'     => $request->policy_settings['phone_number_required'],
            'policy_settings->address_required'          => $request->policy_settings['address_required'],
            'policy_settings->name_required'             => $request->policy_settings['name_required'],
        ]);

        return redirect()->route('payment-links.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PaymentLink  $paymentLink
     * @return \Illuminate\Http\Response
     */
    public function edit(PaymentLink $paymentLink)
    {
        return Inertia::render('PaymentLinks/Edit', [
            'paymentLink'   => $paymentLink,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PaymentLink  $paymentLink
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PaymentLink $paymentLink)
    {
        $request->validate([
            'amount'        => ['required', 'numeric', 'min:1', 'max:2000'],
            'description'   => ['nullable', 'string', 'max:500'],
            'finished_at'   => ['required', 'boolean'],
            'policy_settings.email_required'          => ['required', 'boolean', 'accepted'],
            'policy_settings.phone_number_required'   => ['required', 'boolean'],
            'policy_settings.address_required'        => ['required', 'boolean'],
            'policy_settings.name_required'           => ['required', 'boolean'],
        ]);

        $paymentLink->update([
            'amount'        => $request->amount,
            'description'   => $request->description,
            'finished_at'   => $request->finished_at == true ? now() : null,
            'policy_settings->email_required'            => true,
            'policy_settings->phone_number_required'     => $request->policy_settings['phone_number_required'],
            'policy_settings->address_required'          => $request->policy_settings['address_required'],
            'policy_settings->name_required'             => $request->policy_settings['name_required'],
        ]);

        return redirect()->route('payment-links.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PaymentLink  $paymentLink
     * @return \Illuminate\Http\Response
     */
    public function destroy(PaymentLink $paymentLink)
    {
        //
    }
}
