<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Color;
use App\Models\Size;

class Product extends Model
{
    use HasFactory;

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
        return $this->belongsTo(Color::class, 'size_id', 'id');
    }
    public function productToColor(){
        return $this->belongsTo(Size::class, 'color_id', 'id');
    }
}
