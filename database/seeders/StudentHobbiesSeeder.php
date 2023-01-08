<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class StudentHobbiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $student = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
        $hobby = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
        for ($i = 1; $i < 20; $i++) {
            DB::table('student_hobby')->insert(
                [
                    'student_id' => Arr::random($student),
                    'hobby_id' => Arr::random($hobby),
                ]
            );
        }
    }
}
