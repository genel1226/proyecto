<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('licencias_usuarios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('licencia_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->date('fecha_asignacion');
            $table->date('fecha_remocion')->nullable();
            $table->char('estado', 1)->default('A')->comment('A=Activo, I=Inactivo');
            $table->string('motivo_remocion', 255)->nullable();
            $table->timestamps();
            
            $table->unique(['licencia_id', 'user_id', 'fecha_remocion']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('licencias_usuarios');
    }
};