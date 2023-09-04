<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Course::create([
            'name' => 'Основы JavaScript'
        ]);
        Course::create([
            'name' => 'Типы данных'
        ]);
        Course::create([
            'name' => 'Объекты: основы'
        ]);
    }
}
