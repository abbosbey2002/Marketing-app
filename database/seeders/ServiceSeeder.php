<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('services')->insert([
            [
                'name_ru' => 'Услуга 1',
                'name_uz' => 'Xizmat 1',
                'name_en' => 'Service 1',
                'category_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name_ru' => 'Услуга 2',
                'name_uz' => 'Xizmat 2',
                'name_en' => 'Service 2',
                'category_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name_ru' => 'Услуга 3',
                'name_uz' => 'Xizmat 3',
                'name_en' => 'Service 3',
                'category_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
