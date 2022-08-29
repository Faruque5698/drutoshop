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
use App\Models\TempData;
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


        $temp_data = new TempData();
        $temp_data->size_id = $request->size_id;
        $temp_data->size_name = $request->size_text;
        $temp_data->color_code = $request->color_code;
        $temp_data->color_name = $request->color_text;
        $temp_data->quantity = $request->size_color_qty;
        $temp_data->save();

        $datas = TempData::all();


        return $datas;


    }







    public function store(Request $request)
    {

        $this->validate($request, [
            'product_name' => 'required',
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



        $temp_datas = TempData::all();
        $colors = [];
        foreach($temp_datas as $color){
             $colors[] =  $color->color_code;
        };
    

        $sizes = [];
        foreach($temp_datas as $size){
          $sizes[] = $size->size_name;
        };

    



        $slug_name =  Str::slug(Str::lower($request->product_name));
        $sku = "PRO"."-"."BD"."-".rand(11111,99999);
        $total_price = $request->quantity * $request->discount_price;

        if ($request->hasFile('image')) {
            $product_image = $request->file('image');
            $ext = $product_image->getClientOriginalExtension();
            $imageName = time().'-'.'.'.$ext;
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
                    'size' => json_encode($sizes),
                    'color' => json_encode($colors),
                    'discount_rate' => $request->discount_rate,
                    'price' => $request->price,
                    'quantity' => $request->quantity,
                    'discount_price' => $request->discount_price,
                    'discription' => $request->discription,
                    'image' => $imageUrl,
                    'slug' => $slug_name,
                    'sku' => $sku,
                    'credit'=> $request->discount_type,
                    'total_price' =>$total_price,
                    'status' => $request->status,
                    'created_at' => Carbon::now(),
                ]);

                if($product_id){

                    $gallery = GalleryProduct::insertGetId([
                            'product_id' => $product_id,
                            'image' => $imageUrl,
                    ]);

                    if ($request->hasFile('image1')) {
                        $product_image = $request->file('image1');
                        $ext = $product_image->getClientOriginalExtension();
                        $imageName1 = time().'-'.'.'.$ext;
                        $directory = 'assets/images/product/';
                        $imageUrl1 = $directory.$imageName1;
                        $product_image ->move($directory,$imageName1);


                       GalleryProduct::where('id', $gallery)->update([
                            'image1' => $imageUrl1,
                        ]);
                    }
                    if ($request->hasFile('image2')) {
                        $product_image = $request->file('image2');
                        $ext = $product_image->getClientOriginalExtension();
                        $imageName2 = time().'-'.'.'.$ext;
                        $directory = 'assets/images/product/';
                        $imageUrl2 = $directory.$imageName2;
                        $product_image ->move($directory,$imageName2);

                        GalleryProduct::where('id', $gallery)->update([
                            'image2' => $imageUrl2,
                        ]);

                    }
                    if ($request->hasFile('image3')) {
                        $product_image = $request->file('image3');
                        $ext = $product_image->getClientOriginalExtension();
                        $imageName3 = time().'-'.'.'.$ext;
                        $directory = 'assets/images/product/';
                        $imageUrl3 = $directory.$imageName3;
                        $product_image ->move($directory,$imageName3);

                         GalleryProduct::where('id', $gallery)->update([
                            'image3' => $imageUrl3,
                        ]);
                    }


                    

                }

                if ($product_id) {

                       $color_sizes = TempData::all();
                  
                        foreach($color_sizes as $color_size){
                            $color_size_qty = new ColorSizeQty();
                            $color_size_qty->product_id = $product_id;
                            $color_size_qty->size_id = $color_size['size_id'];
                            $color_size_qty->size_name = $color_size['size_name'];
                            $color_size_qty->color_code = $color_size['color_code'];
                            $color_size_qty->color_name = $color_size['color_name'];
                            $color_size_qty->size_color_qty = $color_size['quantity'];
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

        TempData::truncate();


        return redirect()->route('admin.product')->with('message', 'Product Uplopad Successfully');
    }



    public function show($id)
    {

        $single_product = Product::with('size_color_qty_product','gallery_product')->find($id);

        //return $single_product;
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

    public function futurs($id)
    {
        $feature = Product::find($id);

        if ($feature->feature_product == 0) {
            Product::where('id', $feature->id)->update([
                'feature_product' => 1,
            ]);
            return back()->with('message', 'Feature Product Add Successfully');
        }else{
            Product::where('id',$feature->id)->update([
               'feature_product' => 0,
            ]);
            return back()->with('message', 'Feature Product Remove Successfully');
        }

    }

    public function trands($id)
    {
       $trand = Product::find($id);

        if ($trand->trand_product == 0) {
            Product::where('id', $trand->id)->update([
                'trand_product' => 1,
            ]);
            return back()->with('message', 'Tranding Product Add Successfully');
        }else{
            Product::where('id',$trand->id)->update([
               'trand_product' => 0,
            ]);
            return back()->with('message', 'Tranding Product Remove Successfully');
        }

    }

    public function exclusive($id)
    {
        $exclusive = Product::find($id);

        if ($exclusive->exclusive_product == 0) {
            Product::where('id', $exclusive->id)->update([
                'exclusive_product' => 1,
            ]);
            return back()->with('message', 'Exclusive Product Add Successfully');
        }else{
            Product::where('id',$exclusive->id)->update([
               'exclusive_product' => 0,
            ]);
            return back()->with('message', 'Exclusive Product Remove Successfully');
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
                    // 'size_id' => $request->size_id,
                    // 'color_id' => $request->color_id,
                    // 'color_id' => $request->color_id,
                    'price' => $request->price,
                    'quantity' => $request->quantity,
                    'discount_price' => $request->discount_price,
                    'discription' => $request->discription,
                    'image' => $imageUrl,
                    'slug' => $slug_name,
                    'sku' => $sku,
                    'discount_type'=> $request->discount_type,
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
                    // 'size_id' => $request->size_id,
                    // 'color_id' => $request->color_id,
                    // 'color_id' => $request->color_id,
                    'price' => $request->price,
                    'quantity' => $request->quantity,
                    'discount_price' => $request->discount_price,
                    'discription' => $request->discription,
                    'slug' => $slug_name,
                    'sku' => $sku,
                    'discount_price' => $request->discount_price,
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
