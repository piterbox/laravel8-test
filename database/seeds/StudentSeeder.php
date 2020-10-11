<?php

use App\Group;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $group_ids = Group::pluck('id')->toArray();
        $start = strtotime("01 January 1990");
        $end = strtotime("31 December 2005");
        $students_arr = [];

        foreach ($group_ids as $group_id) {
            for ($i = 0; $i < 10; $i++){
                $timestamp = mt_rand($start, $end);
                $students_arr[] = [
                    'first_name' => Str::random(10),
                    'last_name' => Str::random(10),
                    'patronymic' => Str::random(10),
                    'date_of_birth' => date('Y-m-d', $timestamp),
                    'group_id' => $group_id
                ];
            }
        }
        DB::table('students')->insert($students_arr);
    }
}
