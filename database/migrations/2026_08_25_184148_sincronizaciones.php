<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sincronizaciones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('empresa_id')->constrained()->onDelete('cascade');
            $table->string('tipo_sincronizacion', 50)->comment('erp, payroll, active_directory, etc');
            $table->datetime('fecha_ultima_sync')->nullable();
            $table->char('estado', 1)->default('A')->comment('A=Activo, I=Inactivo, E=Error');
            $table->integer('registros_procesados')->default(0);
            $table->integer('registros_con_error')->default(0);
            $table->text('detalle_error')->nullable();
            $table->json('configuracion')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sincronizaciones');
    }
};