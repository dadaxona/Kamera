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
        Schema::create('clentmalumots', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->string('namese2')->nullable();
            $table->string('familiya')->nullable();
            $table->date('sana')->nullable();
            $table->string('tels')->nullable();
            $table->string('tels2')->nullable();
            $table->string('region')->nullable();
            $table->string('adress')->nullable();
            $table->string('orentr')->nullable();
            $table->string('ishjoyi')->nullable();
            $table->string('lavozim')->nullable();
            $table->string('qoshimachaish')->nullable();
            $table->text('qoshimcha')->nullable();
            $table->text('coment')->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')
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
        Schema::dropIfExists('clentmalumots');
    }
};
