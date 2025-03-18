<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Offer;
use App\Models\Category;

class DatabaseSeeder extends Seeder

{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        // Créer des catégories
        $category1 = Category::create(['name' => 'Technology']);
        $category2 = Category::create(['name' => 'Fashion']);
        Offer::create([
            'name' => 'Laptop Sale',
            'description' => 'Discount on all laptops',
            'category_id' => $category1->id,
        ]);
    
        Offer::create([
            'name' => 'T-shirt Sale',
            'description' => 'Buy one get one free',
            'category_id' => $category2->id,
        ]);
    }
}
