<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'adminName' => 'kenken',
            'uname' => 'kenken',
            'email' => 'admin@admin.admin',
            'prev' => '0',
            'password' => Hash::make('kenken'),
        ]);
    }
}
