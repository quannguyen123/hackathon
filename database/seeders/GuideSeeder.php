<?php

namespace Database\Seeders;

use App\Models\Guide;
use Illuminate\Database\Seeder;

class GuideSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Guide::create([
            'name'           => 'name 1',
            'filename'       => 'filename 1',
            'description'    => 'description 1',
            'sort_no'        => 1,
            'project_id'     => 1,
        ]);

        Guide::create([
            'name'           => 'name 2',
            'filename'       => 'filename 2',
            'description'    => 'description 2',
            'sort_no'        => 2,
            'project_id'     => 1,
        ]);

        Guide::create([
            'name'           => 'name 3',
            'filename'       => 'filename 3',
            'description'    => 'description 3',
            'sort_no'        => 3,
            'project_id'     => 1,
        ]);

        Guide::create([
            'name'           => 'name 4',
            'filename'       => 'filename 4',
            'description'    => 'description 4',
            'sort_no'        => 4,
            'project_id'     => 1,
        ]);

        Guide::create([
            'name'           => 'name 5',
            'filename'       => 'filename 5',
            'description'    => 'description 5',
            'sort_no'        => 5,
            'project_id'     => 1,
        ]);
    }
}
