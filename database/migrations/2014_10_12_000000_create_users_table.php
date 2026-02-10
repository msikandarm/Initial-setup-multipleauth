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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->statusColumn();
            $table->string('name', 75);
            $table->string('email', 100)->unique();
            $table->string('username', 25)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password', 200);
            $table->rememberToken();
            $table->timestamp('last_login_at')->nullable();
            $table->timestamps();

            $table->index(['status', 'username', 'email']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
