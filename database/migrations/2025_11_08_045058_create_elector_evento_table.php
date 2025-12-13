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
        Schema::create('elector_evento', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('evento_id');
            $table->unsignedBigInteger('elector_id');
            $table->boolean('asistio')->default(false);
            $table->timestamps();

            // Foreign keys
            $table->foreign('evento_id')
                  ->references('id')
                  ->on('eventos')
                  ->onDelete('cascade');
                  
            $table->foreign('elector_id')
                  ->references('id')
                  ->on('electores')
                  ->onDelete('cascade');

            // Unique constraint to prevent duplicate registrations
            $table->unique(['evento_id', 'elector_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('elector_evento');
    }
};
