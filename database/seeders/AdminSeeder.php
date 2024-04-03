<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use RuntimeException;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Config;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (!$this->hasCredentials()) {
            throw new RuntimeException('Cannot seed admin. Credentials were not provided');
        }
        $adminRole = Role::query()->where('name', 'admin')->firstOrFail();

        $admin =  User::query()
            ->firstOrNew(
                ['name' => config('admin.name'),],
                ['password' => config('admin.password')]
            );
        $admin->role()->associate($adminRole);
        $admin->save();
    }
    private function hasCredentials(): bool
    {
        return Config::has('admin.name') && Config::has('admin.password');
    }
}
