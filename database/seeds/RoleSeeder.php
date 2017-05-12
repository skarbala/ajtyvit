<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert(
            array(
                array(
                    'id' =>'1',
                    'description' => 'pouzivatel',
                    'role' => 'USER',
                ),
                array(
                    'id'=>'2',
                    'description' => 'administrator',
                    'role' => 'ADMIN',
                )
            )
        );
    }
}
