<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Country;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class TourSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $country1 = Country::create([
            'name' => 'Syria'
        ]);
        $country2 = Country::create([
            'name' => 'Australia'
        ]);
        $country3 = Country::create([
            'name' => 'Thailand'
        ]);
        $country4 = Country::create([
            'name' => 'Canada'
        ]);

        $category1 = Category::create([
            'name' => 'Religious Sites',
            'name' => Str::slug('Religious Sites', '-')
        ]);
        $category2 = Category::create([
            'name' => 'Neighbourhoods',
            'name' => Str::slug('Neighbourhoods', '-')
        ]);
        $category3 = Category::create([
            'name' => 'Historic Sites',
            'name' => Str::slug('Historic Sites', '-')
        ]);
        $category4 = Category::create([
            'name' => 'Speciality Museums',
            'name' => Str::slug('Speciality Museums', '-')
        ]);
        $category5 = Category::create([
            'name' => 'Castles',
            'name' => Str::slug('Castles', '-')
        ]);

        $touristPlaces = [
            [
                'name' => 'Damascus Umayyad Mosque',
                'slug' => Str::slug('Damascus Umayyad Mosque','-'),
                'description' => 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.',
                "category_id" => $category1->id,
                "country_id" => $country1->id,
            ],
            [
                'name' => 'Old City',
                'slug' => Str::slug('Old City','-'),
                'description' => 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.',
                "category_id" => $category2->id,
                "country_id" => $country1->id,
            ],
            [
                'name' => 'Aleppo Citadel',
                'slug' => Str::slug('Aleppo Citadel','-'),
                'description' => 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.',
                "category_id" => $category3->id,
                "country_id" => $country1->id,
            ],
            [
                'name' => 'The National Museum of Damascus',
                'slug' => Str::slug('The National Museum of Damascus','-'),
                'description' => 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.',
                "category_id" => $category4->id,
                "country_id" => $country1->id,
            ],
            [
                'name' => 'Saint Simon Citadel',
                'slug' => Str::slug('Saint Simon Citadel','-'),
                'description' => 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.',
                "category_id" => $category3->id,
                "country_id" => $country1->id,
            ],
            [
                'name' => 'Site of Palmyra',
                'slug' => Str::slug('Site of Palmyra','-'),
                'description' => 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.',
                "category_id" => $category3->id,
                "country_id" => $country1->id,
            ],
            [
                'name' => 'Salah el-Din Citadel',
                'slug' => Str::slug('Salah el-Din Citadel','-'),
                'description' => 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.',
                "category_id" => $category3->id,
                "country_id" => $country1->id,
            ],
        ];
    }
}
