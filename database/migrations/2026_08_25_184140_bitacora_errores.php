<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bitacora_errores', function (Blueprint $table) {
            $table->id();
            $table->string('tipo', 50)->comment('sincronizacion, email, licencia, pago, etc');
            $table->text('mensaje');
            $table->json('detalles')->nullable();
            $table->char('resuelto', 1)->default('0');
            $table->datetime('fecha_resolucion')->nullable();
            $table->timestamps();
            
            $table->index('tipo');
            $table->index('resuelto');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bitacora_errores');
    }
};