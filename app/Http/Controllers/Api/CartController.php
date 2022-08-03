<?php

namespace App\Http\Controllers\Api;

use App\Helper\ApiResponse;
use App\Http\Controllers\Controller;
use App\Models\AddToCart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add(Request $request){
        $request->validate([
           'product_id'=>'required',
           'product_quantity'=>'required',
           'product_price' => 'required',
            'product_total_price'=>'required'
        ]);

        $user_id = auth()->user()->id;
        $product = AddToCart::where('user_id',$user_id)->where('product_id',$request->product_id)->first();
        if ($product == null){
            $cart = new AddToCart();
            $cart->user_id = auth()->user()->id;
            $cart->product_id = $request->product_id;
            $cart->product_price = $request->product_price;
            $cart->product_quantity = $request->product_quantity;
            $cart->product_total_price = $request->product_total_price;
            $cart->save();

            $p = AddToCart::where('user_id',$user_id)->get();


            return ApiResponse::success($p);
        }else{
            $product->product_quantity = $request->product_quantity;
            $product->product_total_price = $request->product_total_price;
            $product->product_price = $request->product_price;
            $product->save();


            $p = AddToCart::where('user_id',$user_id)->get();

            return ApiResponse::success($p);
        }
    }

    public function view(){
        $p = AddToCart::where('user_id',auth()->user()->id)->get();
        if ($p -> isEmpty()){
            return ApiResponse::not_found();
        }else{
            return ApiResponse::success($p);
        }

    }

    public function remove($id){
        $p = AddToCart::find($id);
        $p->delete();
        $data = [];
        return ApiResponse::success($data);
    }
}
