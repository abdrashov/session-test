<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tests', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('rating_id')->unsigned();
            $table->bigInteger('question_id')->unsigned();
            $table->bigInteger('answer1_id')->unsigned();
            $table->bigInteger('answer2_id')->unsigned();
            $table->bigInteger('answer3_id')->nullable()->unsigned();
            $table->bigInteger('answer4_id')->nullable()->unsigned();
            $table->bigInteger('answer5_id')->nullable()->unsigned();
            $table->bigInteger('right_answer_id')->unsigned();
            $table->bigInteger('user_answer_id')->nullable()->unsigned();
            $table->bigInteger('spent_time')->nullable()->unsigned();
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
        Schema::dropIfExists('tests');
    }
}
