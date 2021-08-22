<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
        'product_id', 'quantity','price','user_ip'
    ];

    public function product_img(){
        return $this->belongsTO(Product::class,'product_id');
    }
}
