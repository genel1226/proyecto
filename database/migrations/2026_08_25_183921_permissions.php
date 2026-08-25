<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('parent_id')->nullable();
            $table->string('name');
            $table->string('guard_name');
            $table->string('description')->default('null');
            $table->string('description_en')->nullable();
            $table->boolean('active')->default(true);
            $table->char('type', 1)->default('2')->comment('0=TÍTULO, 1=LECTURA, 2=EDICIÓN');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('permissions');
    }
};