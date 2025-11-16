<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // First, update existing NULL values with placeholder URLs
        DB::table('users')
            ->whereNull('facebook_link')
            ->update(['facebook_link' => 'https://facebook.com/']);

        DB::table('users')
            ->whereNull('messenger_link')
            ->update(['messenger_link' => 'https://m.me/']);

        // Then make the columns NOT NULL
        Schema::table('users', function (Blueprint $table) {
            $table->string('facebook_link')->nullable(false)->change();
            $table->string('messenger_link')->nullable(false)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('facebook_link')->nullable()->change();
            $table->string('messenger_link')->nullable()->change();
        });
    }
};
