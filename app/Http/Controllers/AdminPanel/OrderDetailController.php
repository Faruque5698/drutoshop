<?php

namespace App\Http\Controllers\AdminPanel;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class OrderDetailController extends Controller
{
    // ORDER DETAILS -----GET METHOD

    public function order()
    {


    	// fetch data order model

        // $orders = DB::table('orders')
        //         ->select('order_id', DB::raw('max(value)'))
        //         ->groupBy('attr_group_id')
        //         ->get();
    	$orders = Order::with('order_to_product')->orderBy('id','DESC')->get()->groupBy('order_id');

    	// return $orders;
    	// // return view 
    	return view('AdminPanel.Order.order-list', [
    		"orders" => $orders
    	]);
    }

    public function order_panding()
    {


        // fetch data order model
        $orders = Order::with('order_to_product')->where('status', 0)->get();

        //return $orders;
        // return view 
        return view('AdminPanel.Order.pending-order', [
            "orders" => $orders
        ]);
    }

    public function order_cancel()
    {


        // fetch data order model
        $orders = Order::with('order_to_product')->where('status', 3)->get();

        //return $orders;
        // return view 
        return view('AdminPanel.Order.cancel-order', [
            "orders" => $orders
        ]);
    }

    public function order_confirm()
    {


        // fetch data order model
        $orders = Order::with('order_to_product')->where('status', 1)->get();

        //return $orders;
        // return view 
        return view('AdminPanel.Order.confirma-order', [
            "orders" => $orders
        ]);
    }

      public function order_success()
    {


        // fetch data order model
        $orders = Order::with('order_to_product')->where('status', 2)->get();

        //return $orders;
        // return view 
        return view('AdminPanel.Order.success-order', [
            "orders" => $orders
        ]);
    }


    // defaults order status = 0

    //order status  confirm = 1

    public function approve($order_id){
    	$orders = Order::where("order_id",$order_id)->get();

        // return $orders;
        foreach($orders as $order){
            if ($order->status == 0) {
            
                    Order::where('id',$order->id)->update([
                        'status' => 1
                    ]);
            }
        }

        return back()->with('message', 'Order Approve Successfully!');


    }


      //order status success = 2

    public function success($order_id){
    	$orders = Order::where("order_id",$order_id)->get();


        foreach($orders as $order){
            if ($order->status == 1) {
            
                    Order::where('id',$order->id)->update([
                        'status' => 2
                    ]);
            }
        }

        return back()->with('message', 'Order Delivery Successfully!');


    }

     //order status  cancel = 3

    public function cancel($order_id){
    	$orders = Order::where("order_id",$order_id)->get();

		foreach($orders as $order){
            if ($order->status == 0) {
            
                    Order::where('id',$order->id)->update([
                        'status' => 3
                    ]);
            }
        }
   		return back()->with('message', 'This Order cancle Successfully!');

    }
}
