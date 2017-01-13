<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBjjEventResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bjj_event_results', function($table){
            $table->increments('id');
            $table->unsignedInteger('bjj_event_id');
            $table->string('title');
            $table->string('place');
            $table->string('name_and_surname');
            $table->string('club_name');
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
        Schema::dropIfExists('bjj_event_results');
    }
}
