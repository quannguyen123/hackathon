<?php

namespace Database\Seeders;

use App\Models\ProjectMember;
use Illuminate\Database\Seeder;

class ProjectMemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProjectMember::create([
            'project_id'        => 1,
            'user_id'           => 1,
        ]);

        ProjectMember::create([
            'project_id'        => 1,
            'user_id'           => 2,
        ]);

        ProjectMember::create([
            'project_id'        => 1,
            'user_id'           => 3,
        ]);

        ProjectMember::create([
            'project_id'        => 1,
            'user_id'           => 4,
        ]);

        ProjectMember::create([
            'project_id'        => 1,
            'user_id'           => 5,
        ]);

        ProjectMember::create([
            'project_id'        => 2,
            'user_id'           => 1,
        ]);

        ProjectMember::create([
            'project_id'        => 2,
            'user_id'           => 2,
        ]);
    }
}
