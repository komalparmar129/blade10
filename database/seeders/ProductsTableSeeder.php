<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\products;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'shampoo ',
                'description' => 'Description of shampoo ',
                'sku' => 001,
                'regular_price' => 10.99,
                'sale_price' => 8.99,
            ],
            [
                'name' => 'shoap ',
                'description' => 'shoap of Product 2',
                'sku' => 002,
                'regular_price' => 15.99,
                'sale_price' => 12.99,
            ],
           
        ];

        foreach ($products as $product) {
            Products::create($product);
        }
    }
    }

