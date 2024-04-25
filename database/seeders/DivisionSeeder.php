<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Division;
use Illuminate\Support\Facades\DB;

class DivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $divisions = [
            ['name' => 'Barisal'],
            ['name' => 'Chattogram'],
            ['name' => 'Dhaka'],
            ['name' => 'Khulna'],
            ['name' => 'Mymensingh'],
            ['name' => 'Rajshahi'],
            ['name' => 'Rangpur'],
            ['name' => 'Sylhet'],
        ];

        DB::table('divisions')->insert($divisions);
    }
}
