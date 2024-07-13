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
        Schema::create('impressions', function (Blueprint $table): void {
            $table->id('impression_id');
            $table->foreignId('user_id')->constrained('users', 'user_id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('novel_id')->constrained('novels', 'novel_id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->longText('impressions');
            $table->timestamp('created_date')->useCurrentOnCreate();
            $table->timestamp('latest_update')->useCurrentOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('impressions');
    }
};
