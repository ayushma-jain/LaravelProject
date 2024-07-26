<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe;

class PaymentGatewayController extends Controller
{
    public function stripe(){
        return view('stripe');
    }

    public function stripePost(Request $request) {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create([
            "amount" => 100 * 100, // amount in cents
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "Test payment from Laravel."
        ]);

        return back()->with('success', 'Payment successful!');
    }
}
