<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'              => 'admin',
            'email'             => 'cuongnq2@hybrid-technologies.vn',
            'password'          => bcrypt('hackathon@123456'),
            'phone_number'      => '0912345678',
            'role_id'           => 1,
            'created_by'        => 1,
        ]);
        User::create([
            'name'              => 'Project Manager',
            'email'             => 'ducnv@hybrid-technologies.vn',
            'password'          => bcrypt('hackathon@123456'),
            'phone_number'      => '0912345678',
            'role_id'           => 2,
            'created_by'        => 1,
        ]);
        User::create([
            'name'              => 'BrSE',
            'email'             => 'trangttt@hybrid-technologies.vn',
            'password'          => bcrypt('hackathon@123456'),
            'phone_number'      => '0912345678',
            'role_id'           => 2,
            'created_by'        => 1,
        ]);
        User::create([
            'name'              => 'Developer',
            'email'             => 'quannv@hybrid-technologies.vn',
            'password'          => bcrypt('hackathon@123456'),
            'phone_number'      => '0912345678',
            'role_id'           => 3,
            'created_by'        => 1,
        ]);
        User::create([
            'name'              => 'TuNT',
            'email'             => 'tunt@hybrid-technologies.vn',
            'password'          => bcrypt('hackathon@123456'),
            'phone_number'      => '0912345678',
            'role_id'           => 1,
            'created_by'        => 1,
        ]);
    }
}
