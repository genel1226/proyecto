<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('licencias', function (Blueprint $table) {
            $table->id();
            $table->foreignId('empresa_id')->constrained()->onDelete('cascade');
            $table->foreignId('plan_id')->constrained()->onDelete('cascade');
            $table->char('tipo_licencia_ref', 1)->default('B')->comment('B=Basica, M=Media, C=Completa, P=Personalizable');
            $table->string('codigo_licencia', 50)->unique()->comment('Código único de licencia');
            $table->char('tipo_licencia', 1)->comment('M=Mensual, A=Anual, P=Permanente');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->integer('cantidad_usuarios')->comment('Usuarios contratados');
            $table->integer('cantidad_activos')->default(0)->comment('Usuarios activos actuales');
            $table->decimal('descuento', 5, 2)->default(0)->comment('Porcentaje de descuento aplicado');
            $table->decimal('precio_final', 14, 4)->nullable()->comment('Precio final con descuento aplicado');
            $table->char('periodo_facturacion', 1)->default('M')->comment('M=Mensual, A=Anual, T=Trimestral');
            $table->date('fecha_proxima_factura')->nullable();
            $table->string('numero_factura', 50)->nullable();
            $table->char('estado', 1)->default('A')->comment('A=Activa, S=Suspendida, E=Expirada, C=Cancelada');
            $table->char('modo_demo', 1)->default('0')->comment('0=Producción, 1=Demo');
            $table->date('ultima_renovacion')->nullable();
            $table->date('proxima_renovacion')->nullable();
            $table->text('observaciones')->nullable();
            $table->json('personalizaciones')->nullable()->comment('Detalles de personalización (solo para tipo P)');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('licencias');
    }
};