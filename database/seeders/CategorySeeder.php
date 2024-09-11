<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
               'id' => 1,
               'name_uz' => 'Tahoe',
               'name_ru' => 'Таҳое',
               'name_en' => 'Tahoe',
            ],
            [
                'id' => 2,
                'name_uz' => 'Traverse',
                'name_ru' => 'Траверсе',
                'name_en' => 'Traverse',
            ],
            [
                'id' => 3,
                'name_uz' => 'Equinox',
                'name_ru' => 'Эқуинох',
                'name_en' => 'Equinox',
            ],
            [
                'id' => 4,
                'name_uz' => 'Captive',
                'name_ru' => 'Саптиве',
                'name_en' => 'Captive',
            ],
            [
                'id' => 5,
                'name_uz' => 'Tracker',
                'name_ru' => 'Траккер',
                'name_en' => 'Tracker',
            ],
            [
                'id' => 6,
                'name_uz' => 'Malibu XL',
                'name_ru' => 'Малибу ХЛ',
                'name_en' => 'Malibu Xl',
            ],
            [
                'id' => 7,
                'name_uz' => 'Lacetti',
                'name_ru' => 'Ласетти',
                'name_en' => 'Lacetti',
            ],
            [
                'id' => 8,
                'name_uz' => 'Onix',
                'name_ru' => 'Оних',
                'name_en' => 'Onix',
            ],
            [
                'id' => 9,
                'name_uz' => 'Cobalt',
                'name_ru' => 'Кобальт',
                'name_en' => 'Cobalt',
            ],
            [
                'id' => 10,
                'name_uz' => 'Damas',
                'name_ru' => 'Дамас',
                'name_en' => 'Damas',
            ],
            [
                'id' => 11,
                'name_uz' => 'Labo',
                'name_ru' => 'Лабо',
                'name_en' => 'Labo',
            ],
            [
                'id' => 12,
                'name_uz' => 'Trailblazer',
                'name_ru' => 'Траилблазер',
                'name_en' => 'Trailblazer',
            ],

        ];
        foreach ($categories as $category)
        {
            Category::create([
                'id' => $category['id'],
                'name_uz' => $category['name_uz'],
                'name_ru' => $category['name_ru'],
                'name_en' => $category['name_en'],
            ]);
        }

    }
}
