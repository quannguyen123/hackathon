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
            'manager_id'           => 3,
            'shared'          => 0,
            'description'       => 'Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
            weebly ning heekya handango imeem plugg dopplr jibjab, movity
            jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
            quora plaxo ideeli hulu weebly balihoo..',
            'start_date'      => '2022-02-01 00:00:00',
            'end_date'        => '2022-12-01 00:00:00',
        ]);
    }
}
