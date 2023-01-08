<?php

namespace Database\Seeders;

use App\Models\HobbyModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HobbySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        HobbyModel::factory()->count(10)->create();
    }
}
