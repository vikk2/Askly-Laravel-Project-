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
        Schema::create('admin_logs', function (Blueprint $table) {
            $table->integer('id')->primary(); // id int NOT NULL (no auto-increment specified)
            $table->unsignedBigInteger('admin_id')->nullable(); // bigint UNSIGNED nullable
            $table->string('action', 255)->nullable(); // varchar(255) nullable
            $table->enum('target_type', ['user', 'article', 'comment', 'admin'])->nullable(); // enum nullable
            $table->integer('target_id')->nullable(); // int nullable
            $table->timestamp('created_at')->useCurrent()->nullable(); // timestamp default CURRENT_TIMESTAMP nullable
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin_logs');
    }
};
