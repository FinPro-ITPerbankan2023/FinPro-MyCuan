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
        Schema::create('history_transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('borrower')->nullable()->constrained('users', 'id');
            $table->foreignId('loan_id')->nullable()->constrained('loans', 'id');
            $table->dateTime('transcation_date')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->string('lender');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('history_transactions');
    }
};
