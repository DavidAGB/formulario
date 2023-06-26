<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsecutivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consecutives', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('monitor_id');
            $table->unsignedBigInteger('cultural_right_id');
            $table->unsignedBigInteger('nac_id');
            $table->string('activity_date'); 
            $table->string('start_time'); 
            $table->string('final_hour'); 
            $table->unsignedBigInteger('expertise_id');
            $table->foreign('monitor_id')->references('id')->on('users');
            $table->foreign('cultural_right_id')->references('id')->on('cultural_rights');
            $table->foreign('nac_id')->references('id')->on('nacs');
            $table->foreign('expertise_id')->references('id')->on('expertises');
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
        Schema::dropIfExists('consecutives');
    }
    
}
