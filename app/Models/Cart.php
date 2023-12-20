<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    private $id;
    private $items = [];


    public function products()
    {
        return $this->belongsToMany(Product::class, 'cart_product')->withPivot('quantity');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'cart_id', 'id');
    }

//    public function minusItem($productId)
//    {
//        $existingProduct = $this->products()->where('product_id', $productId)->first();
//
//
//        if ($existingProduct && $existingProduct->pivot->quantity > 0) {
//            // Decrement the quantity by 1
//            $existingProduct->pivot->quantity -= 1;
//            $existingProduct->pivot->save();
//
//            // Optional: remove the product from the cart if the quantity is 0
//            if ($existingProduct->pivot->quantity === 0) {
//                $this->products()->detach($productId);
//            }
//        }
//    }




//    public function addItem($productId, $quantity)
//    {
//        $existingProduct = $this->products()->where('product_id', $productId)->first();
////        dd($existingProduct);
//
//        if ($existingProduct) {
//            // If the product already exists in the cart, update the quantity
//            $existingProduct->pivot->quantity += $quantity;
//            $existingProduct->pivot->save();
//        } else {
//            // If the product is not in the cart, attach it with the given quantity
//            // TODO: Id is changed
//
//
//            $this->products()->attach($productId, ['quantity' => $quantity]);
//        }
//    }

    public function getItems() {
        // Implementation to retrieve cart items
    }

    public function checkout(PaymentGateway $paymentGateway) {
        // Implementation for the checkout process
    }





}
