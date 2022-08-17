<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'Furniture'
        ]);

        Category::create([
            'name' => 'Toiletry'
        ]);

        Category::create([
            'name' => 'Outdoor'
        ]);

        Product::create([
            'category_id' => 1,
            'name' => 'Sofa Bed',
            'price' => 2500000,
            'description' => 'Comfortable sofa which could also be extended as bed.'
        ]);

        Product::create([
            'category_id' => 1,
            'name' => 'Adjustable Table',
            'price' => 4250000,
            'description' => 'Adjustable working or gaming table. '
        ]);

        Product::create([
            'category_id' => 1,
            'name' => 'Gaming Chair',
            'price' => 2750000,
            'description' => 'Comfortable gaming chair with arm support and adjustable height.'
        ]);

        Product::create([
            'category_id' => 2,
            'name' => 'Shower',
            'price' => 125000,
            'description' => 'For mandi in the bathroom'
        ]);

        Product::create([
            'category_id' => 2,
            'name' => 'Mini Bathtub',
            'price' => 2500000,
            'description' => 'For your kids to play play with water la'
        ]);

        Product::create([
            'category_id' => 3,
            'name' => 'Camping Tent',
            'price' => 1500000,
            'description' => 'For camping outside your house'
        ]);

        Product::create([
            'category_id' => 3,
            'name' => 'Garden Lamp',
            'price' => 275000,
            'description' => 'Lighten your garden with this cozy lamp'
        ]);

        Product::create([
            'category_id' => 3,
            'name' => 'Synthetic Grass',
            'price' => 275000,
            'description' => 'Synthetic grass to green up your terrace'
        ]);
    }
}
