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
        Schema::create('karzina2s', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('tavar_id')->unsigned();
            $table->bigInteger('ichkitavar_id')->unsigned();
            $table->string('clentra')->nullable();
            $table->string('name')->nullable();
            $table->string('raqam')->nullable();
            $table->integer('soni')->nullable();
            $table->integer('hajm')->nullable();
            $table->integer('summa')->nullable();
            $table->integer('summa2')->nullable();
            $table->string('chegirma')->nullable();
            $table->integer('itog')->nullable();
            $table->integer('zakaz')->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')
            ->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('karzina2s');
    }
};