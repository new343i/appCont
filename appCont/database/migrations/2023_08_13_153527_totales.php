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
        Schema::create('Balanza', function (Blueprint $table) {
            $table->bigIncrements('IDBala');
            $table->bigInteger('IDBal')->unsigned();
            $table->bigInteger('IDTC')->unsigned();
            $table->string('Tipo');
            $table->float('totalDeudor');
            $table->float('totalAcreedor');
            $table->float('Total');
            $table->foreign('IDBal')->references('IDBal')->on('Balance')->onDelete('cascade');
            $table->foreign('IDTC')->references('IDTC')->on('tipoConcep')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Balanza');
    }
};
