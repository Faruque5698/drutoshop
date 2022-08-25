<?php

namespace App\Http\Controllers\AdminPanel;

use Str;
use Auth;
use Carbon\Carbon;
use App\Models\Size;
use App\Models\Brand;
use App\Models\Color;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\ColorSizeQty;
use App\Models\StockProduct;
use Illuminate\Http\Request;
use App\Models\GalleryProduct;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('AdminPanel.Product.product', compact('products'));
    }

    public function add()
    {

        // $all_data = SizeColorQuantity::all();
        $categories = Category::all();
        $brands = Brand::all();
        $sizes = Size::all();
        $colors = Color::all();
        return view('AdminPanel.Product.add_product',[
            "categories" => $categories,
            "sizes" => $sizes,
            "colors" => $colors,
            "brands" => $brands,
        ]);



    }

    public function getSubId(Request $request)
    {
    
       $category_id = Subcategory::where('category_id', $request->cat_id)->get();
       $output =   '<option value="" selected>-----Select  Subategory------</option>';
       foreach ($category_id as $subcategory) {
        echo $output = '<option  value="'.$subcategory->id.'">'.$subcategory->title.'</option>';
       
       }


    }
  
    public function storeColorSize(Request $request)
    {

      $product = collect(['size_id' => $request->size_id, 'size_text' => $request->size_text,'color_id' => $request->color_id, 'color_text' => $request->color_text, 'qty' => $request->size_color_qty]);


        Session::push('color_size', $product);


        $outputs = "<div class='form-row mb-2'><div class='col-4'><input type='text'  class='form-control'></div><div class='col-4'> <input type='text' class='form-control'></div><div class='col-2'><input type='text' class='form-control'></div><div class='col-2 text-center'><a href='javascript:void(0)' class='remove ml-2'><i class='fas fa-minus pr-2'></i>remove</a></div></div>";

       foreach(Session::get('color_size') as $key => $data_view){
         
            // echo $data_view['size_text'].$data_view['color_text'];

        echo $outputs = "<div class='form-row mb-2'><div class='col-4'><input type='text' value='".$data_view['size_text']."' class='form-control' disabled></div><div class='col-4'> <input type='text' value='".$data_view['color_text']."' class='form-control' disabled></div><div class='col-2'><input type='text' value='".$data_view['qty']."' class='form-control' disabled></div><div class='col-2 text-center'> <button class='addRow ml-2 btn btn-danger'>Remove</button></div></div>";

         
       }

    }







    public function store(Request $request)
    {

        $this->validate($request, [
            'product_name' => 'required',
            'brand_id' => 'required',
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'size_id' => 'required',
            'color_id' => 'required',
            'quantity' => 'required',
            'discount_type'=>'required',
            'price' => 'required',
            'discount_price' => 'required',
            'discription' => 'required',
            'image' => 'required',
            'image.*' => 'mimes:jpeg,jpg,png',
            'image1.*' => 'mimes:jpeg,jpg,png',
            'image2.*' => 'mimes:jpeg,jpg,png',
            'image3.*' => 'mimes:jpeg,jpg,png',
            'status' => 'required|in:active,inactive'
        ]);

        $slug_name =  Str::slug(Str::lower($request->product_name));
        $sku = "PRO"."-"."BD"."-".rand(11111,99999);
        $total_price = $request->quantity * $request->discount_price;

        if ($request->hasFile('image')) {
            $product_image = $request->file('image');
            $imageName = $product_image->getClientOriginalName();
            $directory = 'assets/images/product/';
            $imageUrl = $directory.$imageName;
            $product_image -> move($directory,$imageName);

            if ($product_image) {
               $product_id = Product::insertGetId([
                    'user_id' => Auth::user()->id,
                    'product_name' => $request->product_name,
                    'brand_id' => $request->brand_id,
                    'category_id' => $request->category_id,
                    'subcategory_id' => $request->subcategory_id,
                    'price' => $request->price,
                    'quantity' => $request->quantity,
                    'discount_price' => $request->discount_price,
                    'discription' => $request->discription,
                    'image' => $imageUrl,
                    'slug' => $slug_name,
                    'sku' => $sku,
                    'discount_type'=> $request->discount_type,
                    'future_product' => "product name",
                    'total_price' =>$total_price,
                    'status' => $request->status,
                    'created_at' => Carbon::now(),
                ]);

                if($product_id){

                    if ($request->hasFile('image1')) {
                        $product_image = $request->file('image1');
                        $imageName1 = $product_image->getClientOriginalName();
                        $directory = 'assets/images/product/';
                        $imageUrl1 = $directory.$imageName1;
                        $product_image ->move($directory,$imageName1);


                       $gallery = GalleryProduct::insertGetId([
                            'product_id' => $product_id,
                            'image' => $imageUrl,
                            'image1' => $imageUrl1,
                        ]);
                    }
                    if ($request->hasFile('image2')) {
                        $product_image = $request->file('image2');
                        $imageName2 = $product_image->getClientOriginalName();
                        $directory = 'assets/images/product/';
                        $imageUrl2 = $directory.$imageName2;
                        $product_image ->move($directory,$imageName2);

                        GalleryProduct::where('id', $gallery)->update([
                            'image2' => $imageUrl2,
                        ]);

                    }
                    if ($request->hasFile('image3')) {
                        $product_image = $request->file('image3');
                        $imageName3 = $product_image->getClientOriginalName();
                        $directory = 'assets/images/product/';
                        $imageUrl3 = $directory.$imageName3;
                        $product_image ->move($directory,$imageName3);

                         GalleryProduct::where('id', $gallery)->update([
                            'image3' => $imageUrl3,
                        ]);
                    }


                    

                }

                if ($product_id) {
                  
                        foreach(Session::get('color_size') as  $key => $color_size){
                            $color_size_qty = new ColorSizeQty();
                            $color_size_qty->product_id = $product_id;
                            $color_size_qty->size_id = $color_size['size_id'];
                            $color_size_qty->color_id = $color_size['color_id'];
                            $color_size_qty->size_color_qty = $color_size['qty'];
                            $color_size_qty->save();   
                        }
                   
                }


              
              $stock_product = new StockProduct();
              $stock_product->product_id = $product_id;
              $stock_product->total_qty = $request->quantity;
              $stock_product->last_qty = $request->quantity;
              $stock_product->sale_qty = 0;
              $stock_product->save();

               
            }

        }

        Session::forget('color_size');


        return redirect()->route('admin.product')->with('message', 'Product Uplopad Successfully');
    }



    public function show($id)
    {

        $single_product = Product::with('product_stock')->find($id);
        return view('AdminPanel.Product.single_view_product', compact('single_product'));
    }

    public function status($id)
    {
        $product_status = Product::find($id);

        if ($product_status->status == 'active') {
            Product::where('id',$product_status->id)->update([
                'status' => 'inactive',
            ]);
            return back()->with('message', 'Product Inactive Successfully');
        }else{
            Product::where('id',$product_status->id)->update([
                'status' => 'active',
            ]);
            return back()->with('message', 'Product Active Successfully');
        }

    }

    public function edit($id)
    {
        $product_edit = Product::find($id);
        $categories = Category::all();
        $brands = Brand::all();
        $sizes = Size::all();
        $colors = Color::all();

        return view('AdminPanel.Product.edit_product', compact('product_edit','categories','brands','sizes','colors'));
    }

    public function update(Request $request)
    {

        $slug_name =  Str::slug(Str::lower($request->product_name));
        $sku = Str::substr($request->product_name,0,3)."-".Str::random();
        $total_price = $request->quantity * $request->discount_price;

        if ($request->hasFile('image')) {
            $product_image = $request->file('image');
            $imageExt = $product_image->getClientOriginalExtension();
            $imageName = time().'.'.$imageExt;
            $directory = 'assets/images/product/';
            $imageUrl = $directory.$imageName;
            $product_image -> move($directory,$imageName);


            if ($product_image) {
                Product::where('id', $request->id)->update([
                    'product_name' => $request->product_name,
                   // 'brand_id' => $request->brand_id,
                    // 'category_id' => $request->category_id,
                    // 'subcategory_id' => $request->subcategory_id,
                    'size_id' => $request->size_id,
                    'color_id' => $request->color_id,
                    'color_id' => $request->color_id,
                    'price' => $request->price,
                    'quantity' => $request->quantity,
                    'discount_price' => $request->discount_price,
                    'discription' => $request->discription,
                    'image' => $imageUrl,
                    'slug' => $slug_name,
                    'sku' => $sku,
                    'discount_type'=> $request->discount_type,
                    'future_product' => "product name",
                    'total_price' =>$total_price,
                    'status' => $request->status,
                    'updated_at' => Carbon::now(),
                ]);
            }
            return redirect()->route('admin.product')->with('message', 'Product Update Successfully');
        }else{

           Product::where('id', $request->id)->update([
                    'product_name' => $request->product_name,
                    //'brand_id' => $request->brand_id,
                    // 'category_id' => $request->category_id,
                    // 'subcategory_id' => $request->subcategory_id,
                    'size_id' => $request->size_id,
                    'color_id' => $request->color_id,
                    'color_id' => $request->color_id,
                    'price' => $request->price,
                    'quantity' => $request->quantity,
                    'discount_price' => $request->discount_price,
                    'discription' => $request->discription,
                    'slug' => $slug_name,
                    'sku' => $sku,
                    'discount_price' => $request->discount_price,
                    'future_product' => "product name",
                    'total_price' =>$total_price,
                    'status' => $request->status,
                    'updated_at' => Carbon::now(),
                ]); 
        }

        return redirect()->route('admin.product')->with('message', 'Product Update Successfully');


    }

    public function destroy($id)
    {
        $product_id = Product::find($id);


        if ($product_id) {
            $Gallery_photo = GalleryProduct::where('product_id', $product_id)->get();

            foreach($Gallery_photo as $gall){
                
                 unlink(public_path('/assets/images/gallery/'.$gall->gallery));
                 $gall->delete();
            }


        }

        $product_id->delete();

        return response()->json(['success'=>'Deleted Successfully!!']);
    
    } 
}
