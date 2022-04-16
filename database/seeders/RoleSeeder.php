<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name'     => 'SuperAdmin',
        ]);
        Role::create([
            'name'     => 'ProjectManager',
        ]);
        Role::create([
            'name'     => 'Developer',
        ]);
        Role::create([
            'name'     => 'Tester',
        ]);
    }
}
