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
        DB::statement("
            ALTER TABLE articles 
            MODIFY COLUMN status ENUM('Published', 'Draft', 'Under Review', 'Under_Review') 
            DEFAULT 'Draft'
        ");

        // Step 2: Update the data to use the new value
        DB::table('articles')
            ->where('status', 'Under Review')
            ->update(['status' => 'Under_Review']);

        // Step 3: Remove the old value from the enum definition
        DB::statement("
            ALTER TABLE articles 
            MODIFY COLUMN status ENUM('Published', 'Draft', 'Under_Review') 
            DEFAULT 'Draft'
        ");

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('articles', function (Blueprint $table) {
            //
        });
    }
};
