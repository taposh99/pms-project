<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserRole;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Exception;
use Illuminate\Support\Facades\DB;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        try {
            DB::beginTransaction();
            $admin = User::create([
                'name' => 'Fatema',
                'email' => 'user@gmail.com',
                'password' => bcrypt('12345678')
            ]);
            $admin->roles()->create([
                'name' => UserRole::ROLE_USER,
            ]);

            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();
        }
    }
}
