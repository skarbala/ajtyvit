<?php

use Illuminate\Database\Seeder;

class AddFreeDaysSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        DB::table('free_days')->insert(
            array(
                array(
                    'date' => '2017-01-01',
                ),
                array(
                    'date' => '2017-01-06',
                ), array(
                'date' => '2017-04-14',
            ),
                array(
                    'date' => '2017-04-17',
                ),
                array(
                    'date' => '2017-05-01',
                ),
                array(
                    'date' => '2017-05-08',
                ),
                array(
                    'date' => '2017-07-05',
                ), array(
                'date' => '2017-08-29',
            ),
                array(
                    'date' => '2017-09-01',
                ),
                array(
                    'date' => '2017-09-15',
                ),
                array(
                    'date' => '2017-11-01',
                ),
                array(
                    'date' => '2017-11-17',
                ),
                array(
                    'date' => '2017-12-24',
                ),
                array(
                    'date' => '2017-12-25',
                ),
                array(
                    'date' => '2017-12-26',
                ),
            )
        );
    }
}
