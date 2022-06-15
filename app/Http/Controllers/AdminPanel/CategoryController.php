<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        return view ('AdminPanel.category.category');
    }
    public function add( ){
        return view('AdminPanel.category.add_category ');
    }
    public function store(Request $request){
        $request->validate([
            'title' => 'required',
            'summary' => 'required',
            'photo' => ' image|nullable',
            'status' => 'required|in:active,inactive'
        ]);

        $category_image = $request->file('photo');
        if ($category_image){
            $imageName = $category_image->getClientOriginalName();
            $directory = 'Admin/image/category/';
            $imageUrl = $directory.$imageName;
            $category_image -> move($directory,$imageName);

            $category = new Category();
            $category->title = $request->title;
            $category->summary = $request->summary;
            $category->status = $request->status;
            $category->photo = $imageUrl ;
            $category->save();
        }else{
            $category = new Category();
            $category->title = $request->title;
            $category->summary = $request->summary;
            $category->status = $request->status;
//            $category->title = $imageUrl ;
            $category->save();
        }

        return back()->with('message','New Category added');
    }
}
