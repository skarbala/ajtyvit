<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Addroles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function($table)
        {
            $table->increments('id');
            $table->string('role');
            $table->string('description');
        });

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

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
