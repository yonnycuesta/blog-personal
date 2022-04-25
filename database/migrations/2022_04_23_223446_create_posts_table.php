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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title', 100)->comment('Título del post');
            $table->text('description')->comment('Descripción del post');
            $table->text('photo')->nullable()->comment('Foto del post');
            $table->text('datetime_created')->nullable()->comment('Fecha y hora de creación del post');
            $table->bigInteger('category_id')->unsigned()->comment('Identificador de la categoría');
            $table->timestamps();

            // Relación entre tablas
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('no action')->onUpdate('no action');
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
};
