<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(AppliUserSeeder::class);
        $this->call(NotificatoinSeeder::class);
        $this->call(GroupInfoSeeder::class);
        $this->call(ScheduleSeeder::class);
        $this->call(ScheduleRelationSeeder::class);
        $this->call(TaskInfoSeeder::class);
        $this->call(CompanyInfoSeeder::class);
        $this->call(TaskMessageSeeder::class);
        $this->call(GroupRelationSeeder::class);
    }
}
