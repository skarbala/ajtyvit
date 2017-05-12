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
                    'description' => 'inzinier',
                    'uivalue' => 'Ing',
                ),
                array(
                    'id'=>'2',
                    'description' => 'magister',
                    'uivalue' => 'Mgr',
                )
            )
        );
    }
}
