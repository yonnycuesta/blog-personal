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
        Schema::create('aboutmes', function (Blueprint $table) {
            $table->id();
            $table->string('fullname', 50)->comment('Nombre completo');
            $table->integer('age')->comment('Edad');
            $table->string('email', 50)->comment('Correo electrónico');
            $table->string('phone', 50)->nullable()->comment('Teléfono');
            $table->string('address', 50)->nullable()->comment('Dirección');
            $table->text('photo')->nullable()->comment('Foto');
            $table->string('designation', 50)->nullable()->nullable()->comment('Cargo');
            $table->text('profile')->nullable()->comment('Perfil');
            $table->timestamps();
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
        Schema::dropIfExists('aboutmes');
    }
};
