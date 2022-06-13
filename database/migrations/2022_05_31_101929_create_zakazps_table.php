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
        Schema::create('zakazps', function (Blueprint $table) {
            $table->id();
            $table->string('malumot')->nullable();
            $table->string('itogs')->nullable();
            $table->string('naqt')->nullable();
            $table->string('plastik')->nullable();
            $table->string('bank')->nullable();
            $table->integer('karzs')->nullable();
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
        Schema::dropIfExists('zakazps');
    }
};
