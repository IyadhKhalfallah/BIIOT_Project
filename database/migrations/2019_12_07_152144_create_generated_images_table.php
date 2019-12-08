<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGeneratedImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('generated_images', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('uploadedImage');
            $table->bigInteger('id_mole')->unsigned()->nullable();
            $table->foreign('id_mole')
              ->references('id_mole')->on('moles')->onDelete('cascade');
            $table->string('asymetry');
            $table->string('border');
            $table->string('color');
            $table->string('diameter');
            $table->string('risk'); 
            $table->string('date');
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
        Schema::dropIfExists('generated_images');
    }
}
