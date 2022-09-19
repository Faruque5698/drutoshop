<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gateway;

class SettingController extends Controller
{
    public function setting()
    {
    	return view('AdminPanel.Settings.Genarel.index');
    }

    public function email()
    {
    	return view('AdminPanel.Settings.Email.index');
    }

    public function paypal_payment()
    {   
        $paypal_page = Gateway::where('code', 101)->first();
        //return $paypal_page;
        return view('AdminPanel.Settings.Payment.Paypal.index', compact('paypal_page'));
    }

    public function stripe_payment()
    {   

        $stripe_page  = Gateway::where('code', 102)->first();
        //return $paypal_page;
        return view('AdminPanel.Settings.Payment.Stripe.index', compact('stripe_page'));
    }

    public function paypal_sslcommerz()
    {
         $ssl_page  = Gateway::where('code', 103)->first();
        //return $paypal_page;
        return view('AdminPanel.Settings.Payment.SSL.index', compact('ssl_page'));
    } 
}
