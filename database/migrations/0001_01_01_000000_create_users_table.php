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
            $table->id('user_id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('phone')->unique();
            $table->string('address');
            $table->string('recovery_email')->unique();
            $table->enum('role', ['admin', 'member', 'guest', 'banned'])->default('guest');
            $table->enum('status', ['active', 'inactive', 'banned'])->default('active');
            $table->timestamp('signon_date')->useCurrent();
            $table->timestamp('last_login')->useCurrentOnUpdate();
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
        Schema::table('users', function (Blueprint $table) {
            $table->dropIfExists('updated_at');
            // $table->dropColumn('deleted_at');
            // $table->dropColumn('role');
            // $table->dropColumn('status');
            // $table->dropColumn('signon_date');
            // $table->dropColumn('last_login');
        });
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
