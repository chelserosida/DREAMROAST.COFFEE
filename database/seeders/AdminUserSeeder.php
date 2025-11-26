<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        Admin::updateOrCreate(
            ['email' => 'chelsea@local'],
            [
                'name' => 'Chelsea',
                'password' => Hash::make('1234'),
            ]
        );
    }
}
