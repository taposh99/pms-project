<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\District;
use Illuminate\Support\Facades\DB;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $districts = [
            //Barisal division
            ['name' => 'Barguna', 'division_id' => 1],
            ['name' => 'Barisal', 'division_id' => 1],
            ['name' => 'Bhola', 'division_id' => 1],
            ['name' => 'Jhalokati', 'division_id' => 1],
            ['name' => 'Patuakhali', 'division_id' => 1],
            ['name' => 'Pirojpur', 'division_id' => 1],

            //Chattogram Division
            ['name' => 'Bandarban', 'division_id' => 2],
            ['name' => 'Brahmanbaria', 'division_id' => 2],
            ['name' => 'Chattogram', 'division_id' => 2],
            ['name' => 'Cumilla', 'division_id' => 2],
            ['name' => 'Cox Bazar', 'division_id' => 2],
            ['name' => 'Feni', 'division_id' => 2],
            ['name' => 'Khagrachhari', 'division_id' => 2],
            ['name' => 'Lakshmipur', 'division_id' => 2],
            ['name' => 'Noakhali', 'division_id' => 2],
            ['name' => 'Rangamati', 'division_id' => 2],
            ['name' => 'Chandpur', 'division_id' => 2],

            //Dhaka Division
            ['name' => 'Dhaka', 'division_id' => 3],
            ['name' => 'Gazipur', 'division_id' => 3],
            ['name' => 'Kishoreganj', 'division_id' => 3],
            ['name' => 'Manikganj', 'division_id' => 3],
            ['name' => 'Narsingdi', 'division_id' => 3],
            ['name' => 'Narayanganj', 'division_id' => 3],
            ['name' => 'Munshiganj', 'division_id' => 3],
            ['name' => 'Rajbari', 'division_id' => 3],
            ['name' => 'Madaripur', 'division_id' => 3],
            ['name' => 'Shariatpur', 'division_id' => 3],
            ['name' => 'Tangail', 'division_id' => 3],
            ['name' => 'Faridpur', 'division_id' => 3],
            ['name' => 'Gopalganj', 'division_id' => 3],

            //Khulna Division
            ['name' => 'Bagerhat', 'division_id' => 4],
            ['name' => 'Chuadanga', 'division_id' => 4],
            ['name' => 'Jashore', 'division_id' => 4],
            ['name' => 'Jhenaidah', 'division_id' => 4],
            ['name' => 'Khulna', 'division_id' => 4],
            ['name' => 'Kushtia', 'division_id' => 4],
            ['name' => 'Magura', 'division_id' => 4],
            ['name' => 'Meherpur', 'division_id' => 4],
            ['name' => 'Narail', 'division_id' => 4],
            ['name' => 'Satkhira', 'division_id' => 4],

            //Mymensingh Division
            ['name' => 'Jamalpur', 'division_id' => 5],
            ['name' => 'Mymensingh', 'division_id' => 5],
            ['name' => 'Netrokona', 'division_id' => 5],
            ['name' => 'Sherpur', 'division_id' => 5],

            //Rajshahi Division
            ['name' => 'Bogura', 'division_id' => 6],
            ['name' => 'Chapainawabganj', 'division_id' => 6],
            ['name' => 'Joypurhat', 'division_id' => 6],
            ['name' => 'Naogaon', 'division_id' => 6],
            ['name' => 'Natore', 'division_id' => 6],
            ['name' => 'Pabna', 'division_id' => 6],
            ['name' => 'Rajshahi', 'division_id' => 6],
            ['name' => 'Sirajganj', 'division_id' => 6],

            //Rangpur Division
            ['name' => 'Dinajpur', 'division_id' => 7],
            ['name' => 'Gaibandha', 'division_id' => 7],
            ['name' => 'Kurigram', 'division_id' => 7],
            ['name' => 'Lalmonirhat', 'division_id' => 7],
            ['name' => 'Nilphamari', 'division_id' => 7],
            ['name' => 'Panchagarh', 'division_id' => 7],
            ['name' => 'Rangpur', 'division_id' => 7],
            ['name' => 'Thakurgaon', 'division_id' => 7],

            //Shylet Division
            ['name' => 'Habiganj', 'division_id' => 8],
            ['name' => 'Moulvibazar', 'division_id' => 8],
            ['name' => 'Sunamganj', 'division_id' => 8],
            ['name' => 'Sylhet', 'division_id' => 8],

        ];

        DB::table('districts')->insert($districts);
    }
}
