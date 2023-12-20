<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable =[
        "id",
        "name",
        "price",
        "description",
        "quantity",
        "product_info1",
        "product_info2",
        "product_info3",
        "product_info4",
        "image",
    ];

    protected $primaryKey = 'id';



    public function carts()
    {
        return $this->belongsToMany(Cart::class, 'cart_product', 'product_id', 'cart_id')->withPivot('quantity');
    }


}
