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
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('nombres')->nullable();
            $table->string('apellidos')->nullable();
            $table->string('zona')->nullable();
            $table->string('dni')->nullable();
            $table->string('estado_civil')->nullable();
            $table->string('fecha_nacimiento')->nullable();
            $table->string('telefono')->nullable();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
