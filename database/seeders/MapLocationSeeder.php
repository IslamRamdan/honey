<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MapLocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $locations = [
            [
                'title_en' => 'Yemen', 'title_ar' => 'اليمن', 'title_fr' => 'Yémen', 'title_es' => 'Yemen',
                'latitude' => 15.5527, 'longitude' => 48.5164,
                'instagram' => '#', 'facebook' => '#', 'website' => '#',
                'is_active' => true, 'sort_order' => 1
            ],
            [
                'title_en' => 'Saudi Arabia', 'title_ar' => 'المملكة العربية السعودية', 'title_fr' => 'Arabie Saoudite', 'title_es' => 'Arabia Saudita',
                'latitude' => 23.8859, 'longitude' => 45.0792,
                'instagram' => '#', 'facebook' => '#', 'website' => '#',
                'is_active' => true, 'sort_order' => 2
            ],
            [
                'title_en' => 'Qatar', 'title_ar' => 'قطر', 'title_fr' => 'Qatar', 'title_es' => 'Catar',
                'latitude' => 25.3548, 'longitude' => 51.1839,
                'instagram' => '#', 'facebook' => '#', 'website' => '#',
                'is_active' => true, 'sort_order' => 3
            ],
            [
                'title_en' => 'Oman', 'title_ar' => 'عُمان', 'title_fr' => 'Oman', 'title_es' => 'Omán',
                'latitude' => 21.4735, 'longitude' => 55.9754,
                'instagram' => '#', 'facebook' => '#', 'website' => '#',
                'is_active' => true, 'sort_order' => 4
            ],
            [
                'title_en' => 'Egypt', 'title_ar' => 'مصر', 'title_fr' => 'Égypte', 'title_es' => 'Egipto',
                'latitude' => 26.8206, 'longitude' => 30.8025,
                'instagram' => '#', 'facebook' => '#', 'website' => '#',
                'is_active' => true, 'sort_order' => 5
            ],
            [
                'title_en' => 'Lebanon', 'title_ar' => 'لبنان', 'title_fr' => 'Liban', 'title_es' => 'Líbano',
                'latitude' => 33.8547, 'longitude' => 35.8623,
                'instagram' => '#', 'facebook' => '#', 'website' => '#',
                'is_active' => true, 'sort_order' => 6
            ],
            [
                'title_en' => 'Palestine', 'title_ar' => 'فلسطين', 'title_fr' => 'Palestine', 'title_es' => 'Palestina',
                'latitude' => 31.9522, 'longitude' => 35.2332,
                'instagram' => '#', 'facebook' => '#', 'website' => '#',
                'is_active' => true, 'sort_order' => 7
            ],
            [
                'title_en' => 'United States', 'title_ar' => 'الولايات المتحدة الأمريكية', 'title_fr' => 'États-Unis', 'title_es' => 'Estados Unidos',
                'latitude' => 37.0902, 'longitude' => -95.7129,
                'instagram' => '#', 'facebook' => '#', 'website' => '#',
                'is_active' => true, 'sort_order' => 8
            ],
            [
                'title_en' => 'Jordan', 'title_ar' => 'الأردن', 'title_fr' => 'Jordanie', 'title_es' => 'Jordania',
                'latitude' => 31.9566, 'longitude' => 35.9457,
                'instagram' => '#', 'facebook' => '#', 'website' => '#',
                'is_active' => true, 'sort_order' => 9
            ]
        ];

        foreach ($locations as $location) {
            \App\Models\MapLocation::create($location);
        }
    }
}
