<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 45);
            $table->char('sigla', 1)->nullable();
            $table->decimal('monto', 14, 4)->default(0);
            $table->integer('cantidad_u')->nullable()->comment('NULL = Ilimitado');
            $table->char('lapso', 1)->nullable()->comment('M=Mensual, A=Anual');
            $table->string('style', 25)->nullable();
            $table->string('paypal_id', 45)->nullable();
            $table->string('stripe_id')->nullable();
            $table->char('tipo', 1)->comment('1=Primario; 2=Personal');
            $table->char('tipo_licencia', 1)->default('B')->comment('B=Basica, M=Media, C=Completa, P=Personalizable');
            $table->json('caracteristicas')->nullable()->comment('Características del plan en JSON');
            $table->integer('orden')->default(0)->comment('Orden de visualización en formulario');
            $table->string('color_badge', 20)->default('#4CAF50')->comment('Color del badge en la UI');
            $table->char('es_personalizable', 1)->default('0')->comment('0=No, 1=Si (para el plan Personalizable)');
            $table->integer('cantidad_min')->nullable()->comment('Cantidad minima de usuarios que debe tener el plan');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('plans');
    }
};