<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStepIdToSubStepsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sub_steps', function (Blueprint $table) {
            $table->unsignedBigInteger('step_id');
            $table->foreign('step_id')->references('id')->on('sub_steps');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sub_steps', function (Blueprint $table) {
            //
        });
    }
}
