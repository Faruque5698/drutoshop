<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ColorsPerSize extends Model
{
    use HasFactory;
    protected $casts = [
        'color_code' => 'array'
    ];
}
