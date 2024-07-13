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
        Schema::create('novels', function (Blueprint $table) {
            $table->id('novel_id');
            $table->string('version_name')->unique();
            $table->string('alt_names')->nullable();
            $table->text('summary');
            $table->json('genre');
            $table->integer('nbr_subscriptions')->default(0);
            $table->integer('nbr_views')->default(0);
            $table->integer('nbr_votes')->default(0);
            $table->float('recommendation_rate')->default(0);
            $table->json('chapters');
            $table->timestamp('authoring_date')->useCurrent();
            $table->timestamp('last_update')->useCurrentOnUpdate();
            $table->text('posterURL');
            $table->text('thumbnailURL');
            $table->json('inspirations');
            $table->json('related_to');
            $table->foreignId('author_id')->constrained('authors', 'author_id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('novels');
    }
};
