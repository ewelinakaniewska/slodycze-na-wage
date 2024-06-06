<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\User;
use Faker\Factory as Faker;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Pobierz wszystkich użytkowników
        $users = User::all();

        // Stwórz 5 przykładowych zamówień
        for ($i = 0; $i < 5; $i++) {
            Order::create([
                'user_id' => $users->random()->id,
                'date' => $faker->dateTimeThisMonth(),
                'status' => $faker->randomElement(['Opłacone', 'Przygotowywane', 'Wysłane', 'Dostarczone']),
                'payment_method' => $faker->randomElement(['Karta kredytowa', 'PayPal', 'Płatność za pobraniem']),
                'total_amount' => $faker->randomFloat(2, 10, 1000),
                'address' => $faker->address,
                'created_at' => $faker->dateTimeThisYear()->format('Y-m-d H:i:s'),
                'updated_at' => $faker->dateTimeThisYear()->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
