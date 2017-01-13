<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMmaEventResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mma_event_results', function($table){
            $table->increments('id');
            $table->unsignedInteger('mma_event_id');
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
        Schema::dropIfExists('mma_event_results');
    }
}
