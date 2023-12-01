<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SubcategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $clientAcquisitionCategory = Category::where('name', 'Klientų Įgijimas')->first();
        $programmingCategory = Category::where('name', 'Programavimas')->first();
        $investingCategory = Category::where('name', 'Investavimas')->first();
        $sportsCategory = Category::where('name', 'Sportas')->first();

        $subcategories = [
             //@desc Client Acquisition related seeds
            ['name' => 'Socialiniai Tinklai', 'category_id' => $clientAcquisitionCategory->id],
            ['name' => 'Nišos', 'category_id' => $clientAcquisitionCategory->id],
            ['name' => 'Papildomas Uždarbis', 'category_id' => $clientAcquisitionCategory->id],
            //@desc Programming related seeds
            ['name' => 'C Sharp', 'category_id' => $programmingCategory->id],
            ['name' => 'PHP', 'category_id' => $programmingCategory->id],
            ['name' => 'Java', 'category_id' => $programmingCategory->id],
            ['name' => 'JavaScript', 'category_id' => $programmingCategory->id],
            //@desc Investing related seeds
            ['name' => 'Kriptovaliutos', 'category_id' => $investingCategory->id],
            ['name' => 'Akcijos', 'category_id' => $investingCategory->id],
            ['name' => 'Nekilnojamas Turtas', 'category_id' => $investingCategory->id],
            // @desc Sports related seeds
            ['name' => 'Kovinis Sportas', 'category_id' => $sportsCategory->id],
            ['name' => 'Fitnesas', 'category_id' => $sportsCategory->id],
        ];

        foreach ($subcategories as $subcategory) {
            $subcategory['slug'] = Str::slug($subcategory['name']);
            Subcategory::create($subcategory);
        }
    }
}
