<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            ['name_uz' => 'Category 1', 'name_ru' => 'Category 1 ru' , 'name_en' => 'Category 1 en', 'created_at' => now(), 'updated_at' => now()],
            ['name_uz' => 'Category 2', 'name_ru' => 'Category 2 ru' , 'name_en' => 'Category 2 en', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
