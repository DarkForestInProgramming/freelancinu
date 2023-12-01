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
            ['name' => 'Klientų Įgijimas', 'description' => 'Efektyvios strategijos ir metodai naujų klientų pritraukimui į jūsų verslą.', 'image' => 'https://res.cloudinary.com/dp0m5mp1s/image/upload/v1701455134/Freelancinu/klientu_igijimas.png'],
            ['name' => 'Programavimas', 'description' => 'Mokymai, naujovės ir patarimai programavimo srityje, skirti tiek pradedantiesiems, tiek patyrusiems programuotojams.', 'image' => 'https://res.cloudinary.com/dp0m5mp1s/image/upload/v1701455342/Freelancinu/programavimas_logo.png'],
            ['name' => 'Investavimas', 'description' => 'Įsigykite finansinę laisvę ir ekonominį saugumą - atraskite patarimus, gudrybes ir naujausius įvykius finansų pasaulyje.', 'image' => 'https://res.cloudinary.com/dp0m5mp1s/image/upload/v1701455475/Freelancinu/investavimas_logo.png'],
            ['name' => 'Sportas', 'description' => 'Įkvėpkite aktyvų gyvenimo būdą - atraskite naudingus patarimus, treniruočių programas ir naujausius sporto įvykius.', 'image' => 'https://res.cloudinary.com/dp0m5mp1s/image/upload/v1701455758/Freelancinu/sportas_logo.png'],
        ];

        foreach ($categories as $category) {
            $category['slug'] = Str::slug($category['name']);
            Category::create($category);
        }
    }
}
