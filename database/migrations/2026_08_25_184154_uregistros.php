<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('uregistros', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->datetime('login_date');
            $table->string('zone')->nullable();
            $table->string('ip');
            $table->string('isp')->nullable();
            $table->string('browser')->nullable();
            $table->char('active', 1);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('uregistros');
    }
};