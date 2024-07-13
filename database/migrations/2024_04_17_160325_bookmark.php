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
        Schema::create('bookmarks', function (Blueprint $table) {
            $table->id('bookmark_id');
            $table->foreignId('user_id')->constrained('users', 'user_id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('novel_id')->constrained('novels', 'novel_id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('chapter_id')->constrained('chapters', 'chapter_id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamp('setted_in')->useCurrent();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookmarks');
    }
};
