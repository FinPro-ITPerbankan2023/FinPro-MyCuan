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
        Schema::create('user_detail', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->date('date_birth')->nullable();
            $table->string('birth_place')->nullable();
            $table->text('street')->nullable();
            $table->text('district')->nullable();
            $table->text('city')->nullable();
            $table->text('province')->nullable();
            $table->integer('post_code')->nullable();
            $table->bigInteger('phone_number')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_detail');

    }
};
