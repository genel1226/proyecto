<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('plantillas_emails', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 100);
            $table->char('tipo', 1)->comment('B=Bienvenida, V=Vencimiento, R=Renovacion, P=Pago, C=Custom, E=Exceso');
            $table->string('asunto');
            $table->longText('contenido_html');
            $table->longText('contenido_texto')->nullable();
            $table->json('variables')->nullable()->comment('Variables disponibles {empresa}, {licencia}, etc');
            $table->char('activo', 1)->default('1');
            $table->timestamps();
            
            $table->index('tipo');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('plantillas_emails');
    }
};