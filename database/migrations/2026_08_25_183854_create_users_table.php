<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('empresa_id')->constrained()->onDelete('cascade');
            $table->string('username', 45)->unique();
            $table->string('name', 40);
            $table->string('email')->unique();
            $table->string('ap_paterno', 50)->default(' ');
            $table->string('ap_materno', 50)->default(' ');
            $table->tinyInteger('active')->default(1)->comment('0=Inactivo, 1=Activo, 2=Eliminado, 6=Incógnito Veedor, 7=Incógnito Admin');
            $table->char('register', 1)->default('0');
            $table->integer('isAdmin')->default(0);
            $table->string('cargo', 100)->nullable();
            $table->date('fecha_nacimiento')->nullable();
            $table->string('direccion', 190)->nullable();
            $table->string('telefono', 20)->nullable();
            $table->string('celular', 20)->nullable();
            $table->string('nro_doc', 20)->nullable();
            $table->string('doc_tipo', 3)->nullable();
            $table->string('expedido', 5)->nullable();
            $table->string('avatar')->default('avatar0.png');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('role_id');
            $table->integer('location_id')->nullable();
            $table->integer('ciudad_id')->nullable();
            $table->rememberToken();
            $table->char('ciudad_trabajo', 2)->nullable();
            $table->string('email2', 100)->nullable();
            $table->string('telf_oficina', 20)->nullable();
            $table->string('interno', 10)->nullable();
            $table->string('telf_corporativo', 20)->nullable();
            $table->json('pref_calendar')->nullable();
            $table->char('sw_filter_dt', 1)->default('1');
            $table->datetime('last_login')->nullable();
            $table->string('firma', 45)->nullable();
            $table->char('layout', 2)->default('LV');
            $table->string('gmail')->nullable();
            $table->char('app_version', 10)->nullable();
            $table->mediumText('firebase_token')->nullable();
            $table->string('phone_model')->nullable();
            $table->char('all_locations', 1)->nullable();
            $table->char('pref_lang', 2)->default('es');
            $table->integer('cost_param_id')->nullable()->comment('Costo hora hombre en dolares');
            $table->unsignedInteger('client_id')->default(0);
            $table->char('user_type', 1)->nullable()->comment('A=Administrador, J=Jefe Tecnico, T=Tecnico, S=Supervisor, U=Auxiliar');
            $table->string('color_avatar', 50)->nullable();
            $table->string('edge_sid')->nullable()->comment('SID de usuario de CMMSedge');
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
