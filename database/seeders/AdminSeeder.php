<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
            'data->name' => 'Admin',
            'email' => 'admin@example.com',
            'data->password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ]);
    }
}
