<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

return new class extends Seeder {
    public function run(): void
    {
        DB::table('services')->insert([
            'name' => 'Web Development',
            'startingPrice' => 1000,
            'skills' => 'PHP, Laravel, HTML, CSS, JavaScript',
            'description' => 'Complete web development service.',
            'category_id' => 1,
            'provider_id' => 1,
        ]);
    }
};
