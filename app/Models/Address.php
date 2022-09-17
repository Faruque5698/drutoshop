<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;


class Address extends Model
{
    use HasFactory;

    protected $fillable = ['address_name', 'address', 'zipcode','city'];


    // public function user()
    // {
    //     return $this->belongsTo('\App\Models\User');
    // }



    public function address()
    {
        return $this->belongsTo(User::class, 'id', 'user_id');
    }




}
