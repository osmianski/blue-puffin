<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        $organization = User::create([
            'type' => User\Type::Organization,
            'slug' => '',
            'data->name' => __('Administrators'),
        ]);

        $organization->users()->create([
            'data->name' => env('ADMIN_NAME', 'Admin'),
            'email' => env('ADMIN_EMAIL', 'admin@example.com'),
            'data->password' => Hash::make(env('ADMIN_PASSWORD', 'secret')),
        ]);
    }
}
