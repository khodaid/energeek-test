<?php

namespace Database\Seeders;

use App\Models\Job;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'id' => '1',
                'name' => 'fontend',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => '2',
                'name' => 'backend',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => '3',
                'name' => 'fullstack',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => '4',
                'name' => 'mobile dev',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];
        Job::insert($data);
    }
}
