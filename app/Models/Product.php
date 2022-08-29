<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\GalleryProduct;
use App\Models\ColorSizeQty;
use App\Models\StockProduct;
use App\Models\Size;
use App\Models\Color;


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
    

    public function size_color_qty_product(){
        return $this->hasMany(ColorSizeQty::class);
    }

    public function favouriteProduct(){
        return $this->hasMany(FavouriteProduct::class);
    }
    public function gallery_product(){
        return $this->hasOne(GalleryProduct::class);
    }
    public function product_stock(){
        return $this->hasOne(StockProduct::class);
    }



    protected $casts = [
        'size' => 'array',
        'color' => 'array',
    ];
}
