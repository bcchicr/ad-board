<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::transaction(function () {
            $this->call([
                RoleSeeder::class,
                AdminSeeder::class,
                UserSeeder::class,
                SuperCategorySeeder::class,
                CategorySeeder::class,
                AdvertisementSeeder::class
            ]);
        });
    }
}
