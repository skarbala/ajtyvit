<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class VacationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacations', function($table)
        {
            $table->increments('id');
            $table->date('vacation_from');
            $table->date('vacation_to');
            $table->integer('user_id')->unsigned();
            $table->integer('status_id')->unsigned();
            $table->integer('days_of_vacation');
            $table->timestamps();

        });
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
