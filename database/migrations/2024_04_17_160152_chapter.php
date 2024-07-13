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
        Schema::create('chapters', function (Blueprint $table) {
            $table->id('chapter_id');
            $table->integer('chapter_order');
            $table->string('chapter_name');
            $table->integer('nbr_views')->default(0);
            $table->timestamp('authoring_date')->useCurrent();
            $table->timestamp('last_update')->useCurrentOnUpdate();
            $table->integer('anticipated_by')->default(0);
            $table->string('audio_label')->nullable();
            $table->string('audio_URL')->nullable();
            $table->foreignId('author_id')->constrained('authors', 'author_id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('novel_id')->constrained('novels', 'novel_id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chapters');
    }
};
