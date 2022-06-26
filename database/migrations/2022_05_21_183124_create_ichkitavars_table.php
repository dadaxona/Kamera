<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ichkitavars', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('tavar_id')->unsigned();
            $table->string('adress')->nullable();
            $table->bigInteger('tavar2_id')->unsigned();
            $table->string('name')->nullable();
            $table->string('raqam')->nullable();
            $table->float('hajm')->nullable();
            $table->integer('summa')->nullable();
            $table->integer('summa2')->nullable();
            $table->integer('summa3')->nullable();
            $table->integer('kurs')->nullable();
            $table->integer('kurs2')->nullable();
            $table->timestamps();
            $table->foreign('tavar_id')->references('id')->on('tavars')
            ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('tavar2_id')->references('id')->on('tavar2s')
            ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ichkitavars');
    }
};
