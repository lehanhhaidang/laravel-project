<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // DB::table('users')->insert([
        //     'fullname' => 'Hai Dang',
        //     'email' => 'lehanhhaidang@gmail.com',
        //     'password' =>Hash::make('12345')
        // ]);

        // User::factory()->count(1000)->create();

        $this->call([
            UserSeeder::class
    ]);
    }
}
