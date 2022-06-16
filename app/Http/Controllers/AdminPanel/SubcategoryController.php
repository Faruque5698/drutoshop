<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    public function index(){
        return view('AdminPanel.subcategory.subcategory');
    }
    public function add(){
        return view('AdminPanel.subcategory.add_subcategory');
    }

    public function save(Request $request){

    }
}
