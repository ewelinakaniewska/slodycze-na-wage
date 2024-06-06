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
             $order->candies()->attach(
                 $candies->random(rand(1, 5))->pluck('id')->toArray(),
                 ['quantity' => rand(1, 10)]
             );
         });
     }
}
