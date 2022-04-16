<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Project::create([
            'name'              => 'BikeBros',
            'manager'           => 3,
            'shared'          => 0,
            'start_date'      => '2022-02-01 00:00:00',
            'end_date'        => '2022-12-01 00:00:00',
        ]);
    }
}
