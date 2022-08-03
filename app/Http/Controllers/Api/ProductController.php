<?php

namespace App\Http\Controllers\Api;

use App\Helper\ApiResponse;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function product(){
        $product = Product::with('productToCategory','productToSubcategory','productToBrand','productToColor','productToSize')->where('status','=','active')->get();
        return response()->json([
            'data'=>['product'=>$product],
        ],200);
    }

    public function pro_details($id)
    {
        $product = Product::with('productToCategory', 'productToSubcategory', 'productToBrand','productToColor','productToSize')->find($id);

            return ApiResponse::success($product);

    }

    public function trending(){
        $product = Product::with('productToCategory','productToSubcategory','productToBrand','productToColor','productToSize')->where('trending','=',1)->get();
//        return response()->json([
//
//        ]);


        if ($product->isEmpty()){
            return ApiResponse::not_found();
        }
        else{
           return ApiResponse::success($product);
        }

    }

    public function popular(){
        $product = Product::with('productToCategory','productToSubcategory','productToBrand','productToColor','productToSize')->where('popular','=',1)->get();
//        return response()->json([
//
//        ]);


        if ($product->isEmpty()){
            return ApiResponse::not_found();
        }
        else{
            return ApiResponse::success($product);
        }
    }
    public function exclusive(){
        $product = Product::with('productToCategory','productToSubcategory','productToBrand','productToColor','productToSize')->where('exclusive','=',1)->get();
//        return response()->json([
//
//        ]);


        if ($product->isEmpty()){
            return ApiResponse::not_found();
        }
        else{
            return ApiResponse::success($product);
        }
    }
}
