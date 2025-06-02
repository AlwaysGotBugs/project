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
        Schema::table('news', function (Blueprint $table) {
            // Add the 'is_published' column as a boolean with a default of false
            $table->boolean('is_published')->default(false)->after('image'); // Adjust 'after' as needed
            // Add the 'published_at' column as a nullable timestamp
            $table->timestamp('published_at')->nullable()->after('is_published');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('news', function (Blueprint $table) {
            // Drop the columns if the migration is rolled back
            $table->dropColumn('is_published');
            $table->dropColumn('published_at');
        });
    }
};