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
        Schema::create('modules', function (Blueprint $table) {
            $table->id();
            $table->string('title', 150)->comment('Titulo del módulo');
            $table->string('subtitle', 100)->nullable()->comment('Subtitulo del módulo');
            $table->text('content')->comment('Contenido del módulo');
            $table->bigInteger('post_id')->unsigned()->comment('Identificador del post');
            $table->timestamps();

            // Relación entre tablas
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('modules');
    }
};
