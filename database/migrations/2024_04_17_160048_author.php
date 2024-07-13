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
        Schema::create('authors', function (Blueprint $table) {
            $table->id('author_id');
            $table->string('nickname')->unique();
            $table->integer('nbr_subscriptions')->default(0);
            $table->integer('nbr_novels')->default(0);
            $table->integer('nbr_chapters')->default(0);
            $table->json('badges')->nullable();
            $table->timestamp('added_in')->useCurrent();
            $table->foreignId('user_id')->constrained('users', 'user_id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('authors');
    }
};
