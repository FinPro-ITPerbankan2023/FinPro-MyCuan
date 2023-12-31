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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('order_id');
            $table->foreignId('loan_id')->constrained('loans', 'id');
            $table->foreignId('user_id')->constrained('users', 'id');
            $table->bigInteger('amount');
            $table->dateTime('payment_date')->default(DB::raw('CURRENT_TIMESTAMP'));;
            $table->string('payment_link');
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
