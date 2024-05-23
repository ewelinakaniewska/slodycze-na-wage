<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Candy;

class CandySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    
    public function run(): void
    {
        Candy::create([
            'name' => 'Truskawkowe landrynki',
            'type' => 'Landrynki',
            'ingredients' => 'Cukier, syrop glukozowy, aromat truskawkowy, barwnik (czerwony burak), kwas cytrynowy',
            'price' => 23.99,
            'img' => file_get_contents(public_path('storage/img/redcandydrops.jpg')),
            'stock' => 200,
            'rating' => 4.2,
            'supplier_id' => 1,
        ]);

        Candy::create([
            'name' => 'Karmelki z solą morską',
            'type' => 'Karmelki',
            'ingredients' => 'Cukier, syrop glukozowy, masło, sól morska',
            'price' => 20.00,
            'img' => file_get_contents(public_path('storage/img/carmelswithseasalt.jpg')),
            'stock' => 150,
            'rating' => 4.5,
            'supplier_id' => 2,
        ]);

        Candy::create([
            'name' => 'Czekoladowe drażetki z orzechami laskowymi',
            'type' => 'Drażetki',
            'ingredients' => 'Czekolada mleczna, orzechy laskowe',
            'price' => 21.00,
            'img' => file_get_contents(public_path('storage/img/chocolatedrageeswithhazelnuts.jpg')),
            'stock' => 100,
            'rating' => 4.8,
            'supplier_id' => 3,
        ]);

        Candy::create([
            'name' => 'Kwaśne robaczki jabłkowe',
            'type' => 'Kwaśne żelki',
            'ingredients' => 'Cukier, syrop glukozowy, skrobia kukurydziana, kwas cytrynowy, aromat jabłkowy, barwniki (E102, E133)',
            'price' => 30.00,
            'img' => file_get_contents(public_path('storage/img/sourappleworms.jpg')),
            'stock' => 300,
            'rating' => 4.3,
            'supplier_id' => 4,
        ]);

        Candy::create([
            'name' => 'Malinowe cukierki w polewie czekoladowej',
            'type' => 'Cukierki',
            'ingredients' => 'Cukier, syrop glukozowy, malina, czekolada gorzka',
            'price' => 35.00,
            'img' => file_get_contents(public_path('storage/img/raspberrycandieswithchocolateicing.jpg')),
            'stock' => 180,
            'rating' => 4.6,
            'supplier_id' => 5,
        ]);
    }
}
