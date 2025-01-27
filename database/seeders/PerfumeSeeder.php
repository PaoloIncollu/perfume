<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Helpers

use Illuminate\Support\Facades\Schema;

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
        
        for($i = 0; $i < 50; $i++) {
            Perfume::create([
                'name_perfume' => fake()->word(),
                'brand' => fake()->word(),
                'price' => fake()->randomFloat(2, 10, 300),
                'size' => fake()->randomDigit(),
                'description' => fake()->word(3),
                'img' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSmPDcY7bqFC6sqa0a0DOXs8U-YJ0E6oAAMyA&s',
            ]);
        }    
    }
}
