<?php

namespace App\Http\Controllers;

use App\Models\PaymentLink;
use Illuminate\Http\Request;
use Inertia\Inertia;

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
        $paymentLinks = $user->paymentLinks()->paginate();

        return Inertia::render('PaymentLinks/Index',[
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
     * @param  \App\Models\PaymentLink  $paymentLink
     * @return \Illuminate\Http\Response
     */
    public function show(PaymentLink $paymentLink)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PaymentLink  $paymentLink
     * @return \Illuminate\Http\Response
     */
    public function edit(PaymentLink $paymentLink)
    {
        //
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
        //
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
