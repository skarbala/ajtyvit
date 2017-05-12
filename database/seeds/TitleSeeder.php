<?php

use Illuminate\Database\Seeder;

class TitleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('titles')->insert(
            array(
                array(
                    'id' =>'1',
                    'description' => 'nezadane',
                    'uivalue' => '',
                ),
                array(
                    'id' =>'2',
                    'description' => 'inzinier',
                    'uivalue' => 'Ing',
                ),
                array(
                    'id'=>'3',
                    'description' => 'magister',
                    'uivalue' => 'Mgr',
                )
            )
        );
    }
}
