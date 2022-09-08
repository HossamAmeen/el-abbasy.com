<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveColumnsFormStepImages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('step_images', function (Blueprint $table) {
            $table->dropForeign(['step_id']);
            $table->dropColumn('step_id');
            $table->dropForeign(['sub_step_id']);
            $table->dropColumn('sub_step_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
