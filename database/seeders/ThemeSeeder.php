<?php

namespace Database\Seeders;

use App\Models\Theme;
use Illuminate\Database\Seeder;

class ThemeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Theme::create([
            'name' => 'Основы',
            'text' => 'Основы языка программирования JavaScript',
            'course_id' => 1
        ]);
        Theme::create([
            'name' => 'Продвинутый',
            'text' => 'Массивы и объекты.',
            'course_id' => 2
        ]);
        Theme::create([
            'name' => 'Сеньёр',
            'text' => 'Классы и ООП',
            'course_id' => 3
        ]);
    }
}
