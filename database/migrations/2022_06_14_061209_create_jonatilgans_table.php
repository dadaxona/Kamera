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
        Schema::create('jonatilgans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('tavarp_id')->unsigned();
            $table->string('adress')->nullable();
            $table->bigInteger('tavar2p_id')->unsigned();
            $table->string('name')->nullable();
            $table->string('raqam')->nullable();
            $table->integer('hajm')->nullable();
            $table->integer('summa')->nullable();
            $table->integer('summa2')->nullable();
            $table->integer('summa3')->nullable();
            $table->integer('kurs')->nullable();
            $table->integer('kurs2')->nullable();
            $table->timestamps();
            $table->foreign('tavarp_id')->references('id')->on('tavarps')
            ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('tavar2p_id')->references('id')->on('tavar2ps')
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
        Schema::dropIfExists('jonatilgans');
    }
};
