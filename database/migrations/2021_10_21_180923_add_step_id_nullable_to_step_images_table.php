<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStepIdNullableToStepImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('step_images', function (Blueprint $table) {
            $table->unsignedBigInteger('step_id')->nullable();
            $table->foreign('step_id')->references('id')->on('steps')->nullable()->onDelete('cascade');
            $table->unsignedBigInteger('sub_step_id')->nullable();
            $table->foreign('sub_step_id')->references('id')->on('sub_steps')->nullable()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('step_images', function (Blueprint $table) {
            //
        });
    }
}
