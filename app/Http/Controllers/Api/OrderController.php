<?php

namespace App\Http\Controllers\Api;

use App\Helper\ApiResponse;
use App\Http\Controllers\Controller;
use App\Models\AddToCart;
use App\Models\ColorSizeQty;
use App\Models\Order;
use App\Models\Product;
use App\Models\StockProduct;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function cash_on_delivary(Request $request){
        $request->validate([
           'address'=>'required',
           'city'=>'required',
//           'isPaid'=>'required',
//           'size'=>'required',
//           'color_code'=>'required',
//           'payment_type'=>'required',
        ]);

        $order_id = 'ord-'.rand(1000,99999);
//        return $order_id;

        $carts = AddToCart::where('user_id','=',auth()->user()->id)->get();
        foreach ($carts as $cart){
            $order = new Order();
            $order->user_id = $cart->user_id;
            $order->product_id = $cart->product_id;
            $order->order_id = $order_id;
            $order->quantity = $cart->product_quantity;
            $order->total_price = $cart->product_total_price;
            $order->size = $cart->size;
            $order->color_code = $cart->color_code;
            $order->address = $request->address;
            $order->city = $request->city;
            $order->payment_type = $request->payment_type;
            $order->isPaid = 0;
            $order->save() ;

//            All product Stock Manage
            $product = StockProduct::where('product_id','=',$cart->product_id)->first();
            $product->last_qty= $product->last_qty - $order->quantity;
            $product->sale_qty = $product->sale_qty + $order->quantity;
            $product->save();
//              Product Color size Stock Manage
            $pro_size_color = ColorSizeQty::where('product_id','=',$cart->product_id)->where('color_code','=', $cart->color_code)->where('size_name','=', $cart->size)->first();

            $pro_size_color->size_color_qty =  $pro_size_color->size_color_qty -  $cart->product_quantity;
            $pro_size_color->save();

//            return $pro_size_color;


            $cart->delete();


        }

        $orders = Order::where('user_id','=',auth()->user()->id)->get();
        return ApiResponse::success($orders);
    }


    public function order_all(Request $request){
        $orders = Order::with('product')->where('user_id','=',auth()->user()->id)->get();
        if ($orders->isEmpty()){
            return ApiResponse::not_found();
        }else{
            return ApiResponse::success($orders);

        }
    }

}
