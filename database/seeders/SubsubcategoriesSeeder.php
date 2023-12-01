<?php

namespace Database\Seeders;

use App\Models\Subcategory;
use App\Models\Subsubcategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SubsubcategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

         //@desc Client aqcuisition related seeds
        $socialSubcategory = Subcategory::where('name', 'Socialiniai Tinklai')->first();
        $nicheSubcategory = Subcategory::where('name', 'Nišos')->first();
        $hustleSubcategory = Subcategory::where('name', 'Papildomas Uždarbis')->first();
         //@desc Programming related seeds
        $phpSubcategory = Subcategory::where('name', 'PHP')->first();
        $jsSubcategory = Subcategory::where('name', 'JavaScript')->first();
        $csharpSubcategory = Subcategory::where('name', 'C Sharp')->first();
        $javaSubcategory = Subcategory::where('name', 'Java')->first();
        //@desc Investing related seeds
        $cryptoSubcategory = Subcategory::where('name', 'Kriptovaliutos')->first();
        $stocksSubcategory = Subcategory::where('name', 'Akcijos')->first();
        $propertySubcategory = Subcategory::where('name', 'Nekilnojamas Turtas')->first();
        //@desc Sports related seeds
        $fightingSubcategory = Subcategory::where('name', 'Kovinis Sportas')->first();
        $fitnessSubcategory = Subcategory::where('name', 'Fitnesas')->first();

        $subsubcategories = [
            //@desc Client aqcuisition related seeds
            ['name' => 'X', 'subcategory_id' => $socialSubcategory->id],
            ['name' => 'LinkedIn', 'subcategory_id' => $socialSubcategory->id],
            ['name' => 'Facebook', 'subcategory_id' => $socialSubcategory->id],
            ['name' => 'Instagram', 'subcategory_id' => $socialSubcategory->id],
            ['name' => 'Techninės ir IT konsultacijos', 'subcategory_id' => $nicheSubcategory->id],
            ['name' => 'Skaitmeninis Marketingas', 'subcategory_id' => $nicheSubcategory->id],
            ['name' => 'UX/UI Dizainas', 'subcategory_id' => $nicheSubcategory->id],
            ['name' => 'Turinio Strategija ir Kūrimas', 'subcategory_id' => $nicheSubcategory->id],
            ['name' => 'Elektroninė ir Internetinė Mažmeninė Prekyba', 'subcategory_id' => $nicheSubcategory->id],
            ['name' => 'Asmeninių Finansų Paslaugos', 'subcategory_id' => $nicheSubcategory->id],
            ['name' => 'Daiktų Perpardavimas', 'subcategory_id' => $hustleSubcategory->id],
            
            //@desc Programming related seeds
            ['name' => 'Laravel', 'subcategory_id' => $phpSubcategory->id],
            ['name' => 'Symfony', 'subcategory_id' => $phpSubcategory->id],
            ['name' => 'React.js', 'subcategory_id' => $jsSubcategory->id],
            ['name' => 'Next.js', 'subcategory_id' => $jsSubcategory->id],
            ['name' => 'Angular.js', 'subcategory_id' => $jsSubcategory->id],
            ['name' => 'Vue.js', 'subcategory_id' => $jsSubcategory->id],
            ['name' => 'Nuxt.js', 'subcategory_id' => $jsSubcategory->id],
            ['name' => 'ASP.NET Core', 'subcategory_id' => $csharpSubcategory->id],
            ['name' => 'Spring', 'subcategory_id' => $javaSubcategory->id],
            ['name' => 'Struts', 'subcategory_id' => $javaSubcategory->id],
            ['name' => 'Hibernate', 'subcategory_id' => $javaSubcategory->id],
            //@desc Investing related seeds
            ['name' => 'Populiarios Kriptovaliutos', 'subcategory_id' => $cryptoSubcategory->id],
            ['name' => 'Naujausi Kriptovaliutų Projektai', 'subcategory_id' => $cryptoSubcategory->id],
            ['name' => 'Kriptovaliutų Prekybos Strategijos', 'subcategory_id' => $cryptoSubcategory->id],
            ['name' => 'Technologijos Akcijos', 'subcategory_id' => $stocksSubcategory->id],
            ['name' => 'Finansų Sektoriaus Akcijos', 'subcategory_id' => $stocksSubcategory->id],
            ['name' => 'Maisto Pramonės Akcijos', 'subcategory_id' => $stocksSubcategory->id],
            ['name' => 'Butai', 'subcategory_id' => $propertySubcategory->id],
            ['name' => 'Namai', 'subcategory_id' => $propertySubcategory->id],
            ['name' => 'Sodybos ir Sklypai', 'subcategory_id' => $propertySubcategory->id],
            //@desc Sports related seeds
            ['name' => 'MMA', 'subcategory_id' => $fightingSubcategory->id],
            ['name' => 'Boksas', 'subcategory_id' => $fightingSubcategory->id],
            ['name' => 'Kikboksas', 'subcategory_id' => $fightingSubcategory->id],
            ['name' => 'Mityba', 'subcategory_id' => $fitnessSubcategory->id],
            ['name' => 'Svorio Priaugimas', 'subcategory_id' => $fitnessSubcategory->id],
            ['name' => 'Ryškinimasis', 'subcategory_id' => $fitnessSubcategory->id],
        ];

        foreach ($subsubcategories as $subsubcategory) {
            $subsubcategory['slug'] = Str::slug($subsubcategory['name']);
            Subsubcategory::create($subsubcategory);
        }
    }
}
