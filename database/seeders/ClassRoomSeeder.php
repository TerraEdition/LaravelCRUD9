<?php

namespace Database\Seeders;

use App\Models\ClassRoomModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClassRoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ClassRoomModel::factory()
            ->count(4)
            ->create();
    }
}
