<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Database\Seeder;

class SubcategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $programmingCategory = Category::where('name', 'Programavimas')->first();
        $cryptoCategory = Category::where('name', 'Kriptovaliutos')->first();
        $realEstateCategory = Category::where('name', 'Nekilnojamas turtas')->first();

        $subcategories = [
            ['name' => 'C#', 'category_id' => $programmingCategory->id],
            ['name' => 'PHP', 'category_id' => $programmingCategory->id],
            ['name' => 'Java', 'category_id' => $programmingCategory->id],
            ['name' => 'JavaScript', 'category_id' => $programmingCategory->id],
        ];

        foreach ($subcategories as $subcategory) {
            Subcategory::create($subcategory);
        }
    }
}
