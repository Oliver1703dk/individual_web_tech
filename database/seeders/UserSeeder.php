<?php

namespace Database\Seeders;

use App\Models\Cart;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cart = new Cart();
        $cart->save();

        User::create([
            'password' => bcrypt('admin'),
            'email' => 'admin@admin.com',
            'phone' => '123',
            'admin' => true,
            'cart_id' => $cart->id,
        ]);
    }
}
