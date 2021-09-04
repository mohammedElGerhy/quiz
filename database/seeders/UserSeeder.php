<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $add = new User;
        $add->name = 'admin';
        $add->email = 'admin@admin.com';
        $add->password = Hash::make('password');
        $add->save();
    }
}
