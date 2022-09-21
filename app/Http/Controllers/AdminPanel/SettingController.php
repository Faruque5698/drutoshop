<?php

namespace App\Http\Controllers\AdminPanel;

use App\Helper\ApiResponse;
use App\Http\Controllers\Controller;
use App\Models\Pusher;
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

    public function pusher(){
        return view('AdminPanel.Settings.pusher.pusher');
    }
    public function add_pusher(Request $request){
        $request->validate([
            'app_id'=>'required',
            'key'=>'required',
            'secret'=>'required',
            'cluster'=>'required',

        ]);
        $app_id = 'PUSHER_APP_ID';
        $key = 'PUSHER_APP_KEY';
        $secret = 'PUSHER_APP_SECRET';
        $cluster = 'PUSHER_APP_CLUSTER';
        $pusher = Pusher::find(1);
        $image = $request->file('image');
        if ($pusher){
            $pusher->app_id = $request->app_id;
            $pusher->key = $request->key;
            $pusher->secret = $request->secret;
            $pusher->cluster = $request->cluster;
            $pusher->save();




            ApiResponse::setEnv($app_id,$request->app_id);
            ApiResponse::setEnv($key,$request->key);
            ApiResponse::setEnv($secret,$request->secret);
            ApiResponse::setEnv($cluster,$request->cluster);
//            $app_id = 'PUSHER_APP_ID';


        }else{

            $pusher = new Pusher();
            $pusher->id = 1;
            $pusher->app_id = $request->app_id;
            $pusher->key = $request->key;
            $pusher->secret = $request->secret;
            $pusher->cluster = $request->cluster;
            $pusher->save();

            ApiResponse::setEnv($app_id,$request->app_id);
            ApiResponse::setEnv($key,$request->key);
            ApiResponse::setEnv($secret,$request->secret);
            ApiResponse::setEnv($cluster,$request->cluster);

        }

        return back()->with('message', 'Pusher update Successfully!!');
    }
}
