<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMmaParticipantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mma_participants', function($table){
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('gender');
            $table->string('age_group');
            $table->string('date_of_birth');
            $table->string('level');
            $table->string('weight_category');
            $table->string('years_training');
            $table->string('club_name');
            $table->string('instructor_name');
            $table->string('email')->nullable();
            $table->string('phone_number');
            $table->boolean('paid');
            $table->unsignedInteger('mma_event_id');
            $table->string('terms_conditions');
            $table->timestamps();

            $table->index('mma_event_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mma_participants');
    }
}
