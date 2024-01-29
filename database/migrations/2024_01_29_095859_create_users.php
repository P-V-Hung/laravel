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
            $table->string('name');
            $table->string('email');
            $table->string('password');
            $table->string('image')->default('uploads/images/avatar-user.jpg');
            $table->tinyInteger('status')->default(0);
            $table->tinyInteger('role')->default(0);
            $table->string('token')->default(NULL);
            $table->string('last_session_login')->default(NULL);
            $table->string('remember_token')->default(NULL);
            $table->string('email_token_repass')->default(NULL);
            $table->timestamps();
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
