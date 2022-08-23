<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Color;
use App\Models\Size;

class ColorSizeQty extends Model
{
    use HasFactory;


    public function product_size(){
        return $this->belongsTo(Size::class, 'size_id', 'id');
    }

    public function product_color(){
        return $this->belongsTo(Color::class, 'color_id', 'id');
    }
}
