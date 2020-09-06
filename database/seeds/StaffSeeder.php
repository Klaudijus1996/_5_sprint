<?php

use Illuminate\Database\Seeder;

class StaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $staff1 = new \App\Staff();
        $staff1->name = "Charles";
        $staff1->surname = "Xavier";
        $staff1->job_description = "UX Designer";
        // $staff1->project_id = "2";
        $staff1->save();
        $staff2 = new \App\Staff();
        $staff2->name = "Eric";
        $staff2->surname = "Novak";
        $staff2->job_description = "Loot Councler";
        // $staff2->project_id = "1";
        $staff2->save();
    }
}
