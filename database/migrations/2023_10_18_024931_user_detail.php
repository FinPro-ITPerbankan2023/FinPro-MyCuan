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
            $table->string('full_name');
            $table->date('date_birth')->nullable();
            $table->string('birth_place');
            $table->text('street');
            $table->text('district');
            $table->text('city');
            $table->text('province');
            $table->integer('post_code')->default(51215)->nullable();
            $table->bigInteger('account_number');
            $table->string('account_name');
            $table->string('bank_name');
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
