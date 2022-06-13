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
        Schema::create('dataps', function (Blueprint $table) {
            $table->id();
            $table->integer('tavarshtuk')->nullable();
            $table->integer('shtuk')->nullable();
            $table->integer('foiz')->nullable();
            $table->integer('dateitog')->nullable();
            $table->integer('opshi')->nullable();
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
        Schema::dropIfExists('dataps');
    }
};
