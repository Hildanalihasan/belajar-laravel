<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name' => 'robby',
            'category_id' => 1,
            'product_code' => '2324',
            'unit' => 'unit',
            'price' => 222222,
            'desc' => 'hmm',
            'stock' => 2
        ]);
    }
}
