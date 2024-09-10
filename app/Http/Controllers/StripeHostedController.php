<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;

class StripeHostedController extends Controller
{
    public function index(){
        return view('checkout');
    }

    public function checkout(){

        Stripe::setApiKey(env('STRIPE_SECRET'));

        $checkout_session = \Stripe\Checkout\Session::create([
            'line_items' =>[
                [
                    'price_data' => [
                        'currency'  => 'usd',
                        'product_data' =>[
                            'name' => 'Product name',
                        ],
                     'unit_amount' => '800' // Amount in cents (e.g., $8.00)

                    ],

                    'quantity' => 1,
                ],


            ],
            'mode' => 'payment',
            'success_url' => route('success'),
            'cancel_url' => route('index')

        ]);

        return redirect()->away($checkout_session -> url);

    }

    public function success(){
        // update order status here.
        // then return the view.
        return view('success');
    }
}
