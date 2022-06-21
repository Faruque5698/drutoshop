<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Subcategory extends Model
{
    use HasFactory;




    public function subcategoryTOcategory()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
