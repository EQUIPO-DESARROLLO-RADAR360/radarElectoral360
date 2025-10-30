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
            $table->string('dni')->unique();
            $table->string('nombres');
            $table->string('apellidP');
            $table->string('apellidoM');
            $table->string('region');
            $table->string('provincia');
            $table->string('distrito');
            $table->string('ocupacion');
            $table->string('whatsapp')->unique();
            $table->string('ticked')->unique();
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
