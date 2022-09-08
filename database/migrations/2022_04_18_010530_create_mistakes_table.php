<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMistakesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mistakes', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->string('content');
            $table->string('content_image')->nullable();
            $table->string('mistake_image')->nullable();
            $table->longtext('mistake_content')->nullable();
            $table->string('solution_image')->nullable();
            $table->longtext('solution_content')->nullable();
            $table->string('suggest_image')->nullable();
            $table->longtext('suggest_content')->nullable();
            $table->unsignedBigInteger('mistake_category_id');
            $table->foreign('mistake_category_id')->references('id')->on('mistake_categories')->onDelete('cascade');
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
        Schema::dropIfExists('mistakes');
    }
}
