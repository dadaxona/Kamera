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
        Schema::create('zakaz2ps', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('zakazp_id')->unsigned();
            $table->bigInteger('tavarp_id')->unsigned();
            $table->bigInteger('tayyorsqlad_id')->unsigned();
            $table->string('clentra')->nullable();
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
            $table->foreign('zakazp_id')->references('id')->on('zakazps')
            ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('tavarp_id')->references('id')->on('tavarps')
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
        Schema::dropIfExists('zakaz2ps');
    }
};
