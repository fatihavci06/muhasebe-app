<?php

namespace Database\Seeders;

use App\Models\Offer;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OfferSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Teklifleri oluştur
        $offers = Offer::factory()->count(5)->create();

        // Her bir teklife rastgele ürünler ata
        $offers->each(function ($offer) {
            $products = Product::inRandomOrder()->take(3)->get();
            $offer->products()->attach($products);
        });
        //
    }
}
