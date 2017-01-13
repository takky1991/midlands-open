<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBjjEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bjj_events', function($table){
            $table->increments('id');

            $table->string('title');
            $table->dateTime('event_start');
            $table->text('content')->nullable();
            $table->unsignedInteger('early_reg_fee');
            $table->unsignedInteger('late_reg_fee');
            $table->unsignedInteger('teen_early_reg_fee');
            $table->unsignedInteger('teen_late_reg_fee');
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
        Schema::dropIfExists('bjj_events');
    }
}
