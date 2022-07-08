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
        Schema::create('arxivps', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('userp_id')->unsigned();
            $table->string('itogs')->nullable();
            $table->string('naqt')->nullable();
            $table->string('plastik')->nullable();
            $table->string('bank')->nullable();
            $table->string('karzs')->nullable();
            $table->timestamps();
            $table->foreign('userp_id')->references('id')->on('userps')
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
        Schema::dropIfExists('arxivps');
    }
};
