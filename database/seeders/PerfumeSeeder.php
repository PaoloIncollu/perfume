<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Helpers
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\File;

// Models
use App\Models\Perfume;

class PerfumeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::withoutForeignKeyConstraints(function () {
            Perfume::truncate();
        });

        $perfumeData = json_decode(File::get(database_path('seeders/perfumes.json')), true);
        
        // Ordina i profumi in base al brand in ordine alfabetico
        usort($perfumeData, function ($a, $b) {
            return strcmp($a['brand'], $b['brand']);
        });
        
        foreach ($perfumeData as $perfume) {
            Perfume::create([
                'name_perfume' => $perfume['name_perfume'],
                'brand' => $perfume['brand'],
                'price' => $perfume['price'],
                'size' => $perfume['size'],
                'description' => $perfume['description'],
                'img' => $perfume['img'],
            ]);
        }
    }
}