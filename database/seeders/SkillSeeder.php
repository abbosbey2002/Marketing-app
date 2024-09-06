<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('skills')->insert([
            [
                'name_en' => 'Skill 1',
                'name_ru' => 'Навык 1',
                'name_uz' => 'Ko\'nikma 1',
                'category' => 'Category 1',
                'service_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name_en' => 'Skill 2',
                'name_ru' => 'Навык 2',
                'name_uz' => 'Ko\'nikma 2',
                'category' => 'Category 2',
                'service_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name_en' => 'Skill 3',
                'name_ru' => 'Навык 3',
                'name_uz' => 'Ko\'nikma 3',
                'category' => 'Category 3',
                'service_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Qo'shimcha yozuvlar kerak bo'lsa, shu yerda qo'shishingiz mumkin
        ]);
    }
}
