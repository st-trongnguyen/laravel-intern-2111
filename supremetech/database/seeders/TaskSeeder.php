<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i <= 5; $i++) {
            $userID = DB::table('users')->insertGetId([
                'name' => $faker->name(),
                'email' => $faker->unique()->safeEmail(),
                'password' => Hash::make('password'),
            ]);
            $countTask = rand(1, 2);
            for ($j = 0; $j <= $countTask; $j++) {
                DB::table('tasks')->insert([
                    'title' => $faker->text(50),
                    'description' =>  $faker->text(500),
                    'type' => rand(1, 10),
                    'status' => rand(0, 1),
                    'start_date' => Carbon::today()->addDays(rand(-15, -5)),
                    'due_date' => Carbon::today()->addDays(rand(1, 3)),
                    'assignee' => $userID,
                    'estimate' => rand(1, 20) * 0.50,
                    'actual' => rand(1, 20) * 0.50,
                ]);
            }
        }
    }
}
