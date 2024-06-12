<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Candy;
use App\Models\Order;

class CandyOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    
     public function run()
     {
         $orders = Order::all();
         $candies = Candy::all();
 
         $orders->each(function ($order) use ($candies) {
            $candyIds = $candies->random(rand(1, 5))->pluck('id')->toArray();
            $price = rand(1399, 2999) / 100;
            $order->candies()->attach(
                $candyIds,
                [
                    'quantity' => rand(1, 10),
                    'price' => $price
                ]
            );
        });
     }
}
