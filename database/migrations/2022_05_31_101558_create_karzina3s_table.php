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
        Schema::create('karzina3s', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('tavar_id')->unsigned();
            $table->bigInteger('ichkitavar_id')->unsigned();
            $table->string('adress')->nullable();
            $table->string('name')->nullable();
            $table->string('raqam')->nullable();
            $table->integer('soni')->nullable();
            $table->integer('hajm')->nullable();
            $table->integer('summa')->nullable();
            $table->integer('summa2')->nullable();
            $table->string('chegirma')->nullable();
            $table->integer('itog')->nullable();
            $table->timestamps();
            $table->foreign('tavar_id')->references('id')->on('tavars')
            ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('ichkitavar_id')->references('id')->on('ichkitavars')
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
        Schema::dropIfExists('karzina3s');
    }
};
