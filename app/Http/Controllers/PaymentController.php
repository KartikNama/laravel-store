<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PaymentController extends Controller
{
    public function payment(Request $request)
{
    $MERCHANT_KEY = env('PAYU_MERCHANT_KEY');
    $SALT = env('PAYU_MERCHANT_SALT');
    $PAYU_BASE_URL = env('PAYU_BASE_URL');

    $txnid = strtoupper(Str::random(12)); // or any unique txnid
    $amount = $request->amount;
    $firstname = Auth::user()->name;
    $email = Auth::user()->email;
    $phone = "9999999999";
    $productinfo = "Order Payment";
    $hash_string = $MERCHANT_KEY . '|' . $txnid . '|' . $amount . '|' . $productinfo . '|' . $firstname . '|' . $email . '|||||||||||' . $SALT;

    // Log the generated hash string for debugging
    \Log::info('Generated Hash String: ' . $hash_string);

    // Generate hash
    $hash = hash('sha512', $hash_string);

    // Return view with all data
    return view('payment.payu_checkout', [
        'MERCHANT_KEY' => $MERCHANT_KEY,
        'txnid' => $txnid,
        'amount' => $amount,
        'firstname' => $firstname,
        'email' => $email,
        'phone' => $phone,
        'productinfo' => $productinfo,
        'hash' => $hash,
        'action' => "https://secure.payu.in/_payment", // or test URL
        'service_provider' => "payu_paisa"
    ]);
}

    public function success(Request $request)
{
    // Handle success - maybe place order and clear cart
    return view('payment.success');
}

public function failure(Request $request)
{
    // Handle failure
    return view('payment.failure');
}
}
