<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\PaymentIntent;

class PaymentController extends Controller
{
    public function showForm()
    {
        // Set your Stripe secret key
        Stripe::setApiKey(env('STRIPE_SECRET'));

        // Create a PaymentIntent with the amount and currency
        $paymentIntent = PaymentIntent::create([
            'amount' => 800, // Amount in cents (e.g., $8.00)
            'currency' => 'usd',
            'automatic_payment_methods' => [
                'enabled' => true,
            ],
        ]);

        // Pass the client_secret to the view
        return view('payment-form', ['clientSecret' => $paymentIntent->client_secret]);
    }

    public function processPayment(Request $request)
    {
        // Set your Stripe secret key
        Stripe::setApiKey(config('services.stripe.secret'));

        try {
            // Retrieve the payment intent using the provided ID
            $paymentIntent = PaymentIntent::retrieve($request->input('payment_intent_id'));

            // Confirm the payment intent
            $paymentIntent->confirm();

            return response()->json(['success' => true, 'paymentIntent' => $paymentIntent]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }
}
