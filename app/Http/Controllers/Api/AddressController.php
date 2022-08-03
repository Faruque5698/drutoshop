<?php

namespace App\Http\Controllers\Api;

use App\Helper\ApiResponse;
use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\AddToCart;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function save(Request $request){
        $request->validate([
           'address_name' => 'required',
            'address'=> 'required',
            'zipcode'=> 'required',
            'city'=> 'required',
        ]);

        $address = new Address();
        $address->user_id = auth()->user()->id;
        $address->address_name = $request->address_name;
        $address->address = $request->address;
        $address->zipcode = $request->zipcode;
        $address->city = $request->city;
        $address->save();

        return ApiResponse::success($address);
    }

    public function all(){
        $address = Address::where('user_id',auth()->user()->id)->get();
        if ($address->isEmpty()){
           return ApiResponse::not_found();
        }
        return ApiResponse::success($address);
    }

    public function remove($id)
    {
        $p = Address::find($id);
        $p->delete();
        $data = [];
        return ApiResponse::success($data);
    }
}
