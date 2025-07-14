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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->text('body')->nullable()->comment('Content of the post');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('category_id')->nullable();
            $table->enum('status', ['Published', 'Draft', 'Under Review'])->default('Draft');
            $table->enum('visibility', ['public', 'private', 'unlisted'])->default('public');
            $table->boolean('comments_allowed')->default(true);
            $table->timestamp('published_at')->nullable();
            $table->string('image_url')->nullable();
            $table->timestamps(); // includes created_at and updated_at
        });

        Schema::table('articles', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
           // $table->foreign('category_id')->references('id')->on('categories')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
