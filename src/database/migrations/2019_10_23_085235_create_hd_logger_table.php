<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHdLoggerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hd_logger', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->tinyInteger('type')->default(2);
            $table->integer('code')->nullable();
            $table->longText('message');
            $table->text('file_name');
            $table->integer('line_no');
            $table->timestamps();
            $table->tinyInteger('status')->default('1');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hd_logger');
    }
}
