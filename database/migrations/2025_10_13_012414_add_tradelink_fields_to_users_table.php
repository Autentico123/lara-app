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
        Schema::table('users', function (Blueprint $table) {
            $table->string('facebook_link')->nullable()->after('email');
            $table->string('messenger_link')->nullable()->after('facebook_link');
            $table->enum('role', ['user', 'admin'])->default('user')->after('messenger_link');
            $table->text('bio')->nullable()->after('role');
            $table->string('avatar')->nullable()->after('bio');
            $table->string('location')->nullable()->after('avatar');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['facebook_link', 'messenger_link', 'role', 'bio', 'avatar', 'location']);
        });
    }
};
