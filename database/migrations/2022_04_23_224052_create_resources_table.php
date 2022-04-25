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
        Schema::create('resources', function (Blueprint $table) {
            $table->id();
            $table->string('name', 20)->comment('Nombre del recurso');
            $table->text('url')->comment('URL del recurso');
            $table->bigInteger('post_id')->nullable()->unsigned()->comment('Identificador del post');
            $table->timestamps();

            // Relación entre tablas
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('set null')->onUpdate('set null');
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
        Schema::dropIfExists('resources');
    }
};
