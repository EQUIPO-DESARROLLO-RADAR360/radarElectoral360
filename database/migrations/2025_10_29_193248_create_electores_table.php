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
        Schema::create('electores', function (Blueprint $table) {
            $table->id();
            $table->string('dni');
            $table->string('nombres');
            $table->string('apellidP');
            $table->string('apellidoM');
            $table->string('region');
            $table->string('provincia');
            $table->string('distrito');
            $table->string('direccion');
            $table->string('ocupacion');
            $table->string('whatsapp');
            $table->string('ticked');
            $table->boolean('terms_accepted')->default(false);
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
        Schema::dropIfExists('electores');
    }
};
