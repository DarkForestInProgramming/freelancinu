<?php

namespace Database\Seeders;

use App\Models\Subcategory;
use App\Models\Subsubcategory;
use Illuminate\Database\Seeder;

class SubsubcategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $phpSubcategory = Subcategory::where('name', 'PHP')->first();
        $jsSubcategory = Subcategory::where('name', 'JavaScript')->first();

        $subsubcategories = [
            ['name' => 'Laravel', 'subcategory_id' => $phpSubcategory->id],
            ['name' => 'Symfony', 'subcategory_id' => $phpSubcategory->id],
            ['name' => 'React JS', 'subcategory_id' => $jsSubcategory->id],
            ['name' => 'Next JS', 'subcategory_id' => $jsSubcategory->id],
        ];

        foreach ($subsubcategories as $subsubcategory) {
            Subsubcategory::create($subsubcategory);
        }
    }
}
