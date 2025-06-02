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
            // Add the 'image' column as a nullable string
            $table->string('image')->nullable()->after('content'); // Adjust 'after' as needed
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('news', function (Blueprint $table) {
            // Drop the column if the migration is rolled back
            $table->dropColumn('image');
        });
    }
};