<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Addtitletable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
          Schema::create('titles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('description');
            $table->string('uivalue');
        });

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

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('titles');
    }
}
