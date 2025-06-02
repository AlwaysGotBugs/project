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
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Add a title column
            $table->string('slug')->unique(); // Add a slug for friendly URLs
            $table->text('content'); // Add the content column
            $table->string('type')->nullable(); // Add a type column, e.g., 'news', 'article', 'report'
            // The 'image', 'is_published', and 'published_at' columns will be added by your other migrations later.
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};