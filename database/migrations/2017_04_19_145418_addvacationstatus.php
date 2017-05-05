<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Addvacationstatus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacation_status', function($table)
        {
            $table->increments('id');
            $table->string('status');
            $table->string('description');
        });

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
