<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('r_accounts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('account_id')
                  ->constrained()
                  ->onDelete('cascade');
            $table->string('r_name');
            $table->string('r_acc_no');
            $table->string('bname');
            $table->string('swiftcode');
            $table->string('remarks', 100);
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
        Schema::dropIfExists('r_accounts');
    }
}
