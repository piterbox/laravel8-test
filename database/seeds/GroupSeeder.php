<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $groups_arr = [];
        for ($i = 0; $i < 5; $i++){
            $groups_arr[] = [
                    'number' => rand(100000, 999999),
                    'course' => rand(1, 5),
                    'faculty' => Str::random(10),
                ];
        }

            DB::table('groups')->insert($groups_arr);

    }
}
