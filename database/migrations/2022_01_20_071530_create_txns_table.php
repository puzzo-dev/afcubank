<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTxnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('txns', function (Blueprint $table) {
            $table->id();
            $table->foreignId('account_id')
                  ->constrained();
            $table->string('txn_no');
            $table->string('txn_type');
            $table->decimal('txn_amount');
            $table->string('txn_status');
            $table->string('txn_flow');
            $table->string('txn_desc', 100)->nullable();
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
        Schema::dropIfExists('txns');
    }
}
