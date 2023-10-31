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
            $table->string('loan_status')->default('Pending');
            $table->integer('amount');
            $table->string('loan_duration');
            $table->text('loan_purpose');
            $table->dateTime('application_date')->default(DB::raw('CURRENT_TIMESTAMP')); // Set the default value to current timestamp
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
