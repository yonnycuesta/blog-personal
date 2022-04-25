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
        Schema::create('tags', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50)->comment('Nombre del tag');
            $table->bigInteger('post_id')->nullable()->unsigned()->comment('Identificador del post');
            $table->bigInteger('portfolio_id')->nullable()->unsigned()->comment('Identificador del portfolio');
            $table->timestamps();

            // Relación entre tablas
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('no action')->onUpdate('no action');
            $table->foreign('portfolio_id')->references('id')->on('portfolios')->onDelete('no action')->onUpdate('no action');
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
        Schema::dropIfExists('tags');
    }
};
