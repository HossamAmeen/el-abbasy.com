<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Transaction;

class MigrateTransactionsToPolymorphic extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->unsignedBigInteger('mediator_id');
            $table->string('mediator_type');
        });
        $transactions = Transaction::all();
        foreach($transactions as $transaction){
          $transaction->mediator_id = $transaction->preview_order_id;
          $transaction->mediator_type = 'App\Models\PreviewOrder';
          $transaction->save();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

    }
}
