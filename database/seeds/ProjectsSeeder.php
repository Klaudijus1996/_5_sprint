<?php

use Illuminate\Database\Seeder;

class ProjectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $project1 = new \App\Projects();
        $project1->title = "World Of Coca-Cola";
        $project1->deadline = "2020-11-23";
        $project1->save();
        $project2 = new \App\Projects();
        $project2->title = "Lineage21";
        $project2->deadline = "2020-10-01";
        $project2->save();
    }
}
