<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeColumnsContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::table('contracts', function (Blueprint $table) {
          $table->float('total_price')->nullable()->change();
          $table->text('batch_value')->nullable()->change();
          $table->integer('number_of_batches')->nullable()->change();
          $table->float('total_price_with_interest')->nullable()->change();
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
