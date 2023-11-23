<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Programavimas'],
            ['name' => 'Kriptovaliutos'],
            ['name' => 'Nekilnojamas turtas'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
