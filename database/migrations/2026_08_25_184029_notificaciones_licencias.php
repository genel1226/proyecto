<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('notificaciones_licencias', function (Blueprint $table) {
            $table->id();
            $table->foreignId('licencia_id')->constrained()->onDelete('cascade');
            $table->char('tipo_licencia', 1)->nullable()->comment('Tipo de licencia asociada');
            $table->char('tipo_notificacion', 1)->comment('V=Vencimiento, E=Exceso usuarios, R=Renovación, P=Pago pendiente, B=Bienvenida');
            $table->datetime('fecha_envio');
            $table->string('destinatario')->comment('Email del destinatario');
            $table->string('asunto', 255);
            $table->longText('contenido');
            $table->integer('plantilla_id')->nullable()->comment('ID de plantilla de email');
            $table->char('estado_envio', 1)->default('P')->comment('P=Pendiente, E=Enviado, F=Fallido');
            $table->integer('intentos')->default(0)->comment('Número de intentos de envío');
            $table->datetime('proximo_intento')->nullable()->comment('Próximo intento programado');
            $table->text('error_mensaje')->nullable()->comment('Mensaje de error si falló');
            $table->datetime('fecha_lectura')->nullable();
            $table->timestamps();
            
            $table->index('estado_envio');
            $table->index('tipo_notificacion');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('notificaciones_licencias');
    }
};