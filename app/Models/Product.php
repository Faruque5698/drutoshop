<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\GalleryProduct;
use App\Models\Color;
use App\Models\Size;

class Product extends Model
{
    use HasFactory;


    protected $fillable = [];

    public function productToBrand(){
        return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }
    public function productToCategory(){
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
    public function productToSubcategory(){
        return $this->belongsTo(Subcategory::class, 'subcategory_id', 'id');
    }
    public function productToSize(){
        return $this->belongsTo(Size::class, 'size_id', 'id');
    }
    public function productToColor(){
        return $this->belongsTo(Color::class, 'color_id','id');
    }

    public function favouriteProduct(){
        return $this->hasMany(FavouriteProduct::class);
    }
    public function gallery_product(){
        return $this->hasMany(GalleryProduct::class);
    }
}
