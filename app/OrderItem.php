<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    /**
    * The URIs that should be excluded from CSRF verification.
    *
    * @var array
    */
   protected $guarded = [];

   public function product(){
    return $this->belongsTO(Product::class,'product_id');
}

}
