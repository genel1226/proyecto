<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('parametros_sistema', function (Blueprint $table) {
            $table->id();
            $table->string('clave', 50)->unique();
            $table->text('valor');
            $table->string('descripcion', 255)->nullable();
            $table->string('categoria', 50)->default('general');
            $table->char('tipo_dato', 1)->default('S')->comment('S=String, N=Número, B=Boolean, J=JSON');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('parametros_sistema');
    }
};