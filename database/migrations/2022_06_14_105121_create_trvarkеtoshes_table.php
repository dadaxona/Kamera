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
        Schema::create('trvarkеtoshes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('tavarp_id')->unsigned();
            $table->string('adress')->nullable();
            $table->bigInteger('tavar2p_id')->unsigned();
            $table->bigInteger('tayyorsqlad_id')->unsigned();
            $table->string('name')->nullable();
            $table->string('raqam')->nullable();
            $table->string('hajm')->nullable();
            $table->string('summa')->nullable();
            $table->string('summa2')->nullable();
            $table->string('summa3')->nullable();
            $table->timestamps();
            $table->foreign('tavarp_id')->references('id')->on('tavarps')
            ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('tavar2p_id')->references('id')->on('tavar2ps')
            ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('tayyorsqlad_id')->references('id')->on('tayyorsqlads')
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
        Schema::dropIfExists('trvarkеtoshes');
    }
};
