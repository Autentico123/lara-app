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
        Schema::table('items', function (Blueprint $table) {
            $table->string('condition', 50)->nullable()->after('price'); // New, Like New, Good, Fair, Poor
            $table->string('brand', 100)->nullable()->after('condition');
            $table->string('model', 100)->nullable()->after('brand');
            $table->boolean('negotiable')->default(true)->after('price');
            $table->string('contact_method', 50)->default('messenger')->after('location'); // messenger, facebook, both
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('items', function (Blueprint $table) {
            $table->dropColumn(['condition', 'brand', 'model', 'negotiable', 'contact_method']);
        });
    }
};
