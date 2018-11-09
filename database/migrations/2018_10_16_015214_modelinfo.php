<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Modelinfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('info', function (Blueprint $table) {
            $table->increments('id');
            $table->text('isiInfo');
            $table->date('expInfo');
            $table->string('penulisInfo');
            $table->timestamps('tglUploadInfo');
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
        Schema::dropIfExists('model_info');
    }
}
