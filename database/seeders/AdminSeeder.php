<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserRole;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Exception;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        try {
            DB::beginTransaction();
            $admin = User::create([
                'name' => 'Sani',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('12345678')
            ]);
            $admin->roles()->create([
                'name' => UserRole::ROLE_ADMIN,
            ]);

            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();
        }
    }
}
