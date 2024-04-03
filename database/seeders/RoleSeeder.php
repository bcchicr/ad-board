<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Enums\UserRole;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (UserRole::cases() as $role) {
            Role::query()->firstOrCreate([
                'name' => $role->value
            ]);
        }
    }
}
