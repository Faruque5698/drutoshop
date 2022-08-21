<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Size;
use App\Models\Color;
use App\Models\Brand;
use App\Models\Product;
use App\Models\GalleryProduct;
use Auth;
use Str;
use Carbon\Carbon;

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



    public function getColor(Request $request)
    {
        $colors = Color::where('id',$request->color_id)->first();

        return $colors->color_name;

    }

    public function getSize(Request $request)
    {
        $sizes = Size::where('id',$request->size_id)->first();

        return $sizes->size_name;

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
            'image' => 'required|image',
            'status' => 'required|in:active,inactive'
        ]);

        $slug_name =  Str::slug(Str::lower($request->product_name));
        $sku = Str::substr($request->product_name,0,3)."-".Str::random();
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
                    'size_id' => $request->size_id,
                    'color_id' => $request->color_id,
                    'size_qty' => $request->size_qty,
                    'color_qty' => $request->color_qty,
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
                    if($request->hasFile('gallery')){
                        $gallery = $request->file('gallery');
                        foreach($gallery as $gall){
                            $gallery_image = $slug_name."-".uniqid().".".$gall->getClientOriginalExtension();
                            $directory = 'assets/images/gallery/';
                            $imageUrl = $directory.$gallery_image;
                            $gallery_uploads = $gall->move($directory, $gallery_image);

                            if($gallery_uploads){
                                $galleyProduct = new GalleryProduct();
                                $galleyProduct->product_id = $product_id;
                                $galleyProduct->image = $imageUrl;
                                $galleyProduct->save();

                            }
                            
                        }
                    }
                }
            }

        }

        return redirect()->route('admin.product')->with('message', 'Product Uplopad Successfully');
    }



    public function show($id)
    {

        $single_product = Product::find($id);
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
