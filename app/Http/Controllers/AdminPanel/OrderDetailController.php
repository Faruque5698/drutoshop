<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderDetailController extends Controller
{
    // ORDER DETAILS -----GET METHOD

    public function order()
    {


    	// fetch data order model
    	$orders = Order::with('order_to_product')->orderBy('id', 'DESC')->get();

    	//return $orders;
    	// return view 
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

    public function approve($id){
    	$order = Order::find($id);

    	if ($order->status == 0) {
    		Order::where('id',$order->id)->update([
    			'status' => 1
    		]);
    		return back()->with('message', 'Order Approve Successfully!');
    	}else{
    		Order::where('id',$order->id)->update([
    			'status' => 0
    		]);
    		return back()->with('message', 'This order has pandening!');
    	}


    }


      //order status success = 2

    public function success($id){
    	$order = Order::find($id);

    	if ($order->status == 1) {
    		Order::where('id',$order->id)->update([
    			'status' => 2
    		]);
    		return back()->with('message', 'This Order complete Successfully!');
    	}else{
    		Order::where('id',$order->id)->update([
    			'status' => 1
    		]);
    		return back()->with('message', 'This order has Approve!');
    	}


    }

     //order status  cancel = 3

    public function cancel($id){
    	$order = Order::find($id);

		Order::where('id',$order->id)->update([
			'status' => 3
		]);
   		return back()->with('message', 'This Order complete Successfully!');

    }
}
