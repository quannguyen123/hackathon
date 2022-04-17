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
            'name'           => 'Bước 1',
            'filename'       => '',
            'description'    => 'Cài đặt hệ điều hành ubuntu',
            'sort_no'        => 1,
            'project_id'     => 1,
        ]);

        Guide::create([
            'name'           => 'Bước 2',
            'filename'       => '',
            'description'    => 'Cài đặt php 7.4, git version 2.35, Composer version 2.3.5, MySQL 5.7',
            'sort_no'        => 2,
            'project_id'     => 1,
        ]);

        Guide::create([
            'name'           => 'Bước 3',
            'filename'       => '',
            'description'    => 'Tải dự án Ec-Cube 4 <a href="https://github.com/EC-CUBE/ec-cube"> Tại Đây </a>',
            'sort_no'        => 3,
            'project_id'     => 1,
        ]);

        Guide::create([
            'name'           => 'Bước 4',
            'filename'       => '',
            'description'    => 'Chạy lệnh install Ec-Cube4',
            'sort_no'        => 4,
            'project_id'     => 1,
        ]);

        Guide::create([
            'name'           => 'Bước 5',
            'filename'       => '',
            'description'    => 'Nhận thưởng 20 triệu',
            'sort_no'        => 5,
            'project_id'     => 1,
        ]);
    }
}
