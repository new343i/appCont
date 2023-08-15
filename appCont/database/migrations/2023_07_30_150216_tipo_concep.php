<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tipoConcep', function (Blueprint $table) {
            $table->bigIncrements('IDTC');
            $table->string('TipoConcep');
            $table->bigInteger('IDClas')->unsigned();
            $table->foreign('IDClas')->references('IDClas')->on('clasConcep')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tipoConcep');
    }
};
