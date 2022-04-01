<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSitesettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sitesettings', function (Blueprint $table) {
            $table->id();
            $table->string('bankname')->nullable();
            $table->string('bankdesc')->nullable();
            $table->string('bankaddress')->nullable();
            $table->string('bankphone')->nullable();
            $table->string('bankemail')->nullable();
            $table->string('logo')->nullable();
            $table->string('pcolor')->nullable();
            $table->string('scolor')->nullable();
            $table->string('currency')->nullable();
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
        Schema::dropIfExists('sitesettings');
    }
}
