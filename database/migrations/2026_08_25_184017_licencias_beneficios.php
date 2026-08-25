<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('licencias_beneficios', function (Blueprint $table) {
            $table->id();
            $table->char('tipo_licencia', 1)->comment('B=Basica, M=Media, C=Completa, P=Personalizable');
            $table->string('beneficio');
            $table->string('icono', 50)->nullable()->comment('Icono para mostrar en UI');
            $table->integer('orden')->default(0);
            $table->timestamps();
            
            $table->index('tipo_licencia');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('licencias_beneficios');
    }
};