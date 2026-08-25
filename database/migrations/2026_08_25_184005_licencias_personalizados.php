<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('licencias_personalizaciones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('licencia_id')->constrained()->onDelete('cascade');
            $table->string('modulo', 100)->comment('Nombre del módulo personalizado');
            $table->text('descripcion')->nullable()->comment('Descripción del módulo');
            $table->decimal('precio_adicional', 14, 4)->default(0)->comment('Costo adicional por este módulo');
            $table->char('estado', 1)->default('A')->comment('A=Activo, I=Inactivo');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('licencias_personalizaciones');
    }
};