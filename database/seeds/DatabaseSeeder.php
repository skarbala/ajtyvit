<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(AddFreeDaysSeeder::class);
         $this->call(TitleSeeder::class);
         $this->call(VacationStatusSeeder::class);
    }
}
