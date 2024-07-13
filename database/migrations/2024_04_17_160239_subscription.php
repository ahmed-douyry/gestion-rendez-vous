<?php

use App\Models\Subscription;
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
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id('subscription_id');
            $table->foreignId('user_id')->constrained('users', 'user_id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('author_id')->nullable()->constrained('authors', 'author_id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamp('subscription_author_date')->nullable()->useCurrentOnUpdate();
            $table->foreignId('novel_id')->nullable()->constrained('novels', 'novel_id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamp('subscription_novel_date')->nullable()->useCurrentOnUpdate();
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscriptions');
    }
};
