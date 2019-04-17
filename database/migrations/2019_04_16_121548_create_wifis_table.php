<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWifisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wifis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ssid');
            $table->unsignedInteger('frequency');
            $table->unsignedInteger('signal_level');
            $table->unsignedInteger('location_id');
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
        Schema::dropIfExists('wifis');
    }
}
