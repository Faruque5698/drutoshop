<?php

namespace App\Http\Controllers\Api;

use App\Helper\ApiResponse;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function product(){
        $product = Product::with('productToCategory','productToSubcategory','productToBrand','colorPerSize')->where('status','=','active')->get();

        return ApiResponse::success($product);
    }

    public function pro_details($id)
    {
        $product = Product::with('productToCategory', 'productToSubcategory', 'productToBrand')->find($id);

            return ApiResponse::success($product);

    }


    public function justLanded()
    {
        $product = Product::with('productToCategory','productToSubcategory','productToBrand')->where('trand_product','=',1)->get();
        if ($product->isEmpty()){
            $data = [];
            return ApiResponse::success($data);
        }
        else{
            return ApiResponse::success($product);
        }
    }

    public function trending(){
        $product = Product::with('productToCategory','productToSubcategory','productToBrand')->where('trand_product','=',1)->get();
        if ($product->isEmpty()){
            $data = [];
            return ApiResponse::success($data);
        }
        else{
            return ApiResponse::success($product);
        }

    }

    public function popular(){
        $product = Product::with('productToCategory','productToSubcategory','productToBrand')->where('feature_product','=',1)->get();
//        return response()->json([
//
//        ]);


        if ($product->isEmpty()){
            $data = [];
            return ApiResponse::success($data);
        }
        else{
            return ApiResponse::success($product);
        }
    }
    public function exclusive(){
        $product = Product::with('productToCategory','productToSubcategory','productToBrand')->where('exclusive_product','=',1)->get();
//        return response()->json([
//
//        ]);



        if ($product->isEmpty()){
            $data = [];
            return ApiResponse::success($data);
        }
        else{
            return ApiResponse::success($product);
        }
    }
}
