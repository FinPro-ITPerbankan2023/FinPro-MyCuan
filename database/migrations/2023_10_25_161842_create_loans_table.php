<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users', 'id');
            $table->foreignId('user_identity_id')->nullable()->constrained('user_identity', 'id');
            $table->foreignId('user_detail_id')->nullable()->constrained('user_detail', 'id');
            $table->foreignId('business_id')->nullable()->constrained('business', 'id');
            $table->boolean('loan_status')->default('0');
            $table->boolean('is_verified')->default('0');
            $table->bigInteger('amount');
            $table->integer('repaid_amount')->default(0);
            $table->string('loan_duration')->default(12);
            $table->text('loan_purpose');
            $table->dateTime('application_date')->default(DB::raw('CURRENT_TIMESTAMP')); // Set the default value to current timestamp
            $table->dateTime('verification_date')->nullable();
            $table->dateTime('approval_date')->nullable();
            $table->dateTime('denied_date')->nullable();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loans');
    }
};
