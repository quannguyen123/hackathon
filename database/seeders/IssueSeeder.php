<?php

namespace Database\Seeders;

use App\Models\Issue;
use Illuminate\Database\Seeder;

class IssueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Issue::create([
            'name' => 'Issue 1',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been ....',
            'user_id' => 1,
            'filename' => 'aaaaa.jpg',
            'project_id' => 1,
            'private' => 1,
        ]);

        Issue::create([
            'name' => 'Issue 2',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been ....',
            'user_id' => 1,
            'filename' => 'aaaaa.jpg',
            'project_id' => 1,
            'private' => 1,
        ]);

        Issue::create([
            'name' => 'Issue 3',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been ....',
            'user_id' => 1,
            'filename' => 'aaaaa.jpg',
            'project_id' => 1,
            'private' => 1,
        ]);

        Issue::create([
            'name' => 'Issue 4',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been ....',
            'user_id' => 1,
            'filename' => 'aaaaa.jpg',
            'project_id' => 1,
            'private' => 1,
        ]);

        Issue::create([
            'name' => 'Issue 5',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been ....',
            'user_id' => 1,
            'filename' => 'aaaaa.jpg',
            'project_id' => 1,
            'private' => 1,
        ]);

        Issue::create([
            'name' => 'Issue 5',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been ....',
            'user_id' => 1,
            'filename' => 'aaaaa.jpg',
            'project_id' => 1,
            'private' => 1,
        ]);

    }
}
