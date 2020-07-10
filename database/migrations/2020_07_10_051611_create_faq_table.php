<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFaqTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mncl_faq', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('question_en');
            $table->string('question_id');
            $table->string('slug_en');
            $table->string('slug_id');
            $table->text('answer_en');
            $table->text('answer_id');
            $table->string('status')->default('SHOW');
            $table->string('create_by')->nullable();
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
        Schema::dropIfExists('mncl_faq');
    }
}
