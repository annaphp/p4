<?php

use Illuminate\Database\Seeder;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tasks')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'description' => 'buy paint',
            'due_date' => Carbon\Carbon::now()->toDateTimeString(),
            'completed' => 0,
            'project_id' => \App\Project::first()->id,



        ]);

        DB::table('tasks')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'description' => 'buy brushes',
            'due_date' => Carbon\Carbon::now()->toDateTimeString(),
            'completed' => 1,
            'project_id'=>\App\Project::first()->id,


        ]);

        DB::table('tasks')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'description' => 'do something else',
            'due_date' => Carbon\Carbon::now()->toDateTimeString(),
            'completed' => 0,
            'project_id' =>\App\Project::first()->id,

        ]);
    }
}
