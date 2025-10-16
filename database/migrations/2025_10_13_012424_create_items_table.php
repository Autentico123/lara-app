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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('item_name', 100);
            $table->text('description');
            $table->string('category', 50);
            $table->decimal('price', 10, 2);
            $table->string('image');
            $table->string('location')->nullable();
            $table->enum('status', ['active', 'sold', 'draft'])->default('active');
            $table->unsignedInteger('views')->default(0);
            $table->timestamps();

            // Indexes for faster queries
            $table->index('category');
            $table->index('status');
            $table->index('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
