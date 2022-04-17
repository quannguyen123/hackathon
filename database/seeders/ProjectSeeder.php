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
            'description'       => 'Giải pháp phần mềm quản lý gara ô tô đơn giản, dễ sử dụng, tùy biến dễ dàng theo yêu cầu của gara của chúng tôi tại....',
            'start_date'      => '2022-02-01 00:00:00',
            'end_date'        => '2022-12-01 00:00:00',
        ]);

        Project::create([
            'name'              => 'MotorBros',
            'manager_id'           => 3,
            'shared'          => 0,
            'description'       => 'Giải pháp phần mềm quản lý gara ô tô đơn giản, dễ sử dụng, tùy biến dễ dàng theo yêu cầu của gara của chúng tôi tại....',
            'start_date'      => '2022-02-01 00:00:00',
            'end_date'        => '2022-12-01 00:00:00',
        ]);
    }
}
