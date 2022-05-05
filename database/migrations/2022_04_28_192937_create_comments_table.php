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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255)->nullable();
            $table->text('description')->comment('Descripción del comentario');
            $table->bigInteger('post_id')->unsigned()->comment('Identificador del post');
            $table->string('datetime_create', 255)->comment('Fecha de creación del comentario')->nullable();
            $table->timestamps();

            // Relación entre tablas
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('no action')->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
};
