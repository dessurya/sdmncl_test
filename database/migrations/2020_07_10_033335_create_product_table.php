<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mncl_product', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title_en');
            $table->string('title_id');
            $table->string('slug_en');
            $table->string('slug_id');
            $table->text('content_en')->nullable();
            $table->text('content_id')->nullable();
            $table->text('picture')->nullable();
            $table->string('meta_title_en');
            $table->string('meta_title_id');
            $table->string('meta_description_en')->nullable();
            $table->string('meta_description_id')->nullable();
            $table->string('meta_keyword_en')->nullable();
            $table->string('meta_keyword_id')->nullable();
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
        Schema::dropIfExists('mncl_product');
    }
}
