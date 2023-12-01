<?php

namespace Database\Seeders;
use Illuminate\Support\Str;


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
            ['name' => 'Klientų Įgijimas', 'description' => 'Efektyvios strategijos ir metodai naujų klientų pritraukimui į jūsų verslą.'],
            ['name' => 'Programavimas', 'description' => 'Mokymai, naujovės ir patarimai programavimo srityje, skirti tiek pradedantiesiems, tiek patyrusiems programuotojams.'],
            ['name' => 'Investavimas', 'description' => 'Įsigykite finansinę laisvę ir ekonominį saugumą - atraskite patarimus, gudrybes ir naujausius įvykius finansų pasaulyje.'],
            ['name' => 'Sportas', 'description' => 'Įkvėpkite aktyvų gyvenimo būdą - atraskite naudingus patarimus, treniruočių programas ir naujausius sporto įvykius.'],
        ];

        foreach ($categories as $category) {
            $category['slug'] = Str::slug($category['name']);
            Category::create($category);
        }
    }
}
