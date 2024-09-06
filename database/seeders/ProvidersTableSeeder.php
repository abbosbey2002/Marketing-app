<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

return new class extends Seeder
{
    public function run(): void
    {
        DB::table('providers')->insert([
            'name' => 'Tech Corp',
            'turnover' => 5000000,
            'teamSize' => 50,
            'tagline' => 'Innovative Solutions',
            'foundedAt' => '2010-01-01',
            'description' => 'Leading tech company.',
            'logo' => 'logo.png',
            'cover' => 'cover.png',
            'email' => 'contact@techcorp.com',
            'password' => bcrypt('password'),
            'remember_token' => str_random(10),
            'language_id' => 1,
            'service_id' => 1,
        ]);
    }
};
