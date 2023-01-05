<?php

namespace Database\Seeders;

use App\Models\Skill;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
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
                'name' => 'Go-Lang',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => '2',
                'name' => 'PHP',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => '3',
                'name' => 'JS',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => '4',
                'name' => 'Python',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];
        Skill::insert($data);
    }
}
