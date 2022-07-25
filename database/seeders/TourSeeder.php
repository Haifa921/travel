<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Country;
use App\Models\TouristPlace;
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
            'slug' => Str::slug('Religious Sites', '-')
        ]);
        $category2 = Category::create([
            'name' => 'Neighbourhoods',
            'slug' => Str::slug('Neighbourhoods', '-')
        ]);
        $category3 = Category::create([
            'name' => 'Historic Sites',
            'slug' => Str::slug('Historic Sites', '-')
        ]);
        $category4 = Category::create([
            'name' => 'Speciality Museums',
            'slug' => Str::slug('Speciality Museums', '-')
        ]);
        $category5 = Category::create([
            'name' => 'Castles',
            'slug' => Str::slug('Castles', '-')
        ]);

        $touristPlaces = [
            [
                'name' => 'Damascus Umayyad Mosque',
                'slug' => Str::slug('Damascus Umayyad Mosque','-'),
                'description' => 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.',
                "category_id" => $category1->id,
                "country_id" => $country1->id,
                "image"=> [
                    "Damascus Umayyad Mosque-1.jpg",
                    "Damascus Umayyad Mosque-2.jpg"
                    ]

            ],
            [
                'name' => 'Old City',
                'slug' => Str::slug('Old City','-'),
                'description' => 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.',
                "category_id" => $category2->id,
                "country_id" => $country1->id,
                "image"=> [
                    "Old City-1.jpg",
                    "Old City-2.jpg",
                    ]
            ],
            [
                'name' => 'Aleppo Citadel',
                'slug' => Str::slug('Aleppo Citadel','-'),
                'description' => 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.',
                "category_id" => $category3->id,
                "country_id" => $country1->id,
                "image"=> [
                    "Aleppo Citadel-1.jpg",
                    "Aleppo Citadel-2.jpg",
                    ]
            ],
            [
                'name' => 'The National Museum of Damascus',
                'slug' => Str::slug('The National Museum of Damascus','-'),
                'description' => 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.',
                "category_id" => $category4->id,
                "country_id" => $country1->id,
                "image"=> [
                    "The National Museum of Damascus-1.jpg",
                    "The National Museum of Damascus-2.jpg",
                    ]
            ],
            [
                'name' => 'Saint Simon Citadel',
                'slug' => Str::slug('Saint Simon Citadel','-'),
                'description' => 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.',
                "category_id" => $category3->id,
                "country_id" => $country1->id,
                "image"=> [
                    "Saint Simon Citadel-1.jpg",
                    "Saint Simon Citadel-2.jpg",
                    ]
            ],
            [
                'name' => 'Site of Palmyra',
                'slug' => Str::slug('Site of Palmyra','-'),
                'description' => 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.',
                "category_id" => $category3->id,
                "country_id" => $country1->id,
                "image"=> [
                    "Site of Palmyra-1.jpg",
                    "Site of Palmyra-2.jpg",
                    ]
            ],
            [
                'name' => 'Salah el-Din Citadel',
                'slug' => Str::slug('Salah el-Din Citadel','-'),
                'description' => 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.',
                "category_id" => $category3->id,
                "country_id" => $country1->id,
                "image"=> [
                    "Salah el-Din Citadel-1.jpg",
                    "Salah el-Din Citadel-2.jpg",
                    ]
            ],
        ];

        foreach ($touristPlaces as $p) {
            $t = TouristPlace::create([
                'name'=> $p['name'],
                'slug'=> $p['slug'],
                'description'=> $p['description'],
                'category_id'=> $p['category_id'],
                'country_id'=> $p['country_id'],
            ]);

            $i = 1;
            foreach ($p['image'] as $image) {
                $file_name = $image;
                $file_size = '500';
                $file_type = 'image/jpg';
                $path = public_path('places/' . $file_name);

                $t->media()->create([
                    'file_path' => $path,
                    'file_name' => $file_name,
                    'file_size' => $file_size,
                    'file_type' => $file_type,
                    'file_status' => true,
                    'file_sort' => $i,
                    'published' => true,
                ]);
                $i++;
            }
        }


    }
}
