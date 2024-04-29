<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $countries = [
            ['name' => 'Bangladesh'],
            ['name' => 'India'],
            ['name' => 'Nepal'],
            ['name' => 'Bhutan'],
            ['name' => 'Sri Lanka'],
            ['name' => 'Maldives'],
            ['name' => 'Pakistan'],
        ];

        DB::table('countries')->insert($countries);
    }
}
