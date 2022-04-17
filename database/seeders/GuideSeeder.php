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
            'name'           => 'Nguyen van A 1',
            'filename'       => 'filename 1',
            'description'    => 'Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
            weebly ning heekya handango imeem plugg dopplr jibjab, movity
            jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
            quora plaxo ideeli hulu weebly balihoo... 1',
            'sort_no'        => 1,
            'project_id'     => 1,
        ]);

        Guide::create([
            'name'           => 'Nguyen van A 2',
            'filename'       => 'filename 2',
            'description'    => 'Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
            weebly ning heekya handango imeem plugg dopplr jibjab, movity
            jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
            quora plaxo ideeli hulu weebly balihoo... 2',
            'sort_no'        => 2,
            'project_id'     => 1,
        ]);

        Guide::create([
            'name'           => 'Nguyen van A 3',
            'filename'       => 'filename 3',
            'description'    => 'Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
            weebly ning heekya handango imeem plugg dopplr jibjab, movity
            jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
            quora plaxo ideeli hulu weebly balihoo... 3',
            'sort_no'        => 3,
            'project_id'     => 1,
        ]);

        Guide::create([
            'name'           => 'Nguyen van A 4',
            'filename'       => 'filename 4',
            'description'    => 'Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
            weebly ning heekya handango imeem plugg dopplr jibjab, movity
            jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
            quora plaxo ideeli hulu weebly balihoo... 4',
            'sort_no'        => 4,
            'project_id'     => 1,
        ]);

        Guide::create([
            'name'           => 'Nguyen van A 5',
            'filename'       => 'filename 5',
            'description'    => 'Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
            weebly ning heekya handango imeem plugg dopplr jibjab, movity
            jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
            quora plaxo ideeli hulu weebly balihoo... 5',
            'sort_no'        => 5,
            'project_id'     => 1,
        ]);
    }
}
