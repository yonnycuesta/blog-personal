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
        Schema::create('portfolios', function (Blueprint $table) {
            $table->id();
            $table->string('title', 100)->comment('Título del proyecto');
            $table->text('description')->comment('Descripción del proyecto');
            $table->text('photo')->nullable()->comment('Foto del proyecto');
            $table->string('portf_client', 100)->nullable()->comment('Cliente del proyecto');
            $table->string('portf_url', 100)->nullable()->comment('URL del proyecto');
            $table->text('date_created')->nullable()->comment('Fecha de creación del proyecto');
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
        Schema::dropIfExists('portfolios');
    }
};
