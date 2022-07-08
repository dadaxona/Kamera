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
        Schema::create('karzina2ps', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('userp_id')->unsigned();
            $table->bigInteger('tavarp_id')->unsigned();
            $table->bigInteger('tayyorsqlad_id')->unsigned();
            $table->string('clentra')->nullable();
            $table->string('name')->nullable();
            $table->string('raqam')->nullable();
            $table->string('soni')->nullable();
            $table->string('hajm')->nullable();
            $table->string('summa')->nullable();
            $table->string('summa2')->nullable();
            $table->string('chegirma')->nullable();
            $table->string('itog')->nullable();
            $table->string('zakaz')->nullable();
            $table->timestamps();
            $table->foreign('userp_id')->references('id')->on('userps')
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
        Schema::dropIfExists('karzina2ps');
    }
};
