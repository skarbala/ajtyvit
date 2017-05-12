<?php

use Illuminate\Database\Seeder;

class VacationStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vacation_status')->insert(
            array(
                array(
                    'id' =>'1',
                    'description' => 'zadana',
                    'status' => 'SUBMITTED',
                ),
                array(
                    'id'=>'2',
                    'description' => 'schvalena',
                    'status' => 'APPROVED',
                ),
                array(
                    'id'=>'3',
                    'description' => 'zamietnuta',
                    'status' => 'DECLINED',
                ),
                array(
                    'id'=>'4',
                    'description' => 'stornovana',
                    'status' => 'CANCELED',
                ),
            )
        );
    }
}
