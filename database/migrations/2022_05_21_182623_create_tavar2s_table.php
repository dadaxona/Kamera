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
        Schema::create('tavar2s', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('tavar_id')->unsigned();
            $table->string('name')->nullable();
            $table->timestamps();
            $table->foreign('tavar_id')->references('id')->on('tavars')
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
        Schema::dropIfExists('tavar2s');
    }
};
