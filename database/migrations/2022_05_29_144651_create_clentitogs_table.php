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
        Schema::create('clentitogs', function (Blueprint $table) {
            $table->id();
            $table->string('tavarshtuk')->nullable();
            $table->string('shtuk')->nullable();
            $table->string('foiz')->nullable();
            $table->string('itog')->nullable();
            $table->string('opshi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clentitogs');
    }
};
