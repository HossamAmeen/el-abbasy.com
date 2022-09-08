<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddApartmentSubStepIdToStepImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('step_images', function (Blueprint $table) {
            $table->unsignedBigInteger('apartment_sub_step_id');
            $table->foreign('apartment_sub_step_id')->references('id')->on('apartment_sub_step');
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
