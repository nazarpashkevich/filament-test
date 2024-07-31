<?php

use App\Models\Transaction;
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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('reference');
            $table->integer('amount')->nullable();
            $table->string('currency')->nullable();
            $table->string('status');
            $table->timestamps();
        });

        Schema::create('transaction_taxes', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Transaction::class)->constrained()->cascadeOnDelete();
            $table->string('calc_id');
            $table->string('reference')->nullable();
            $table->integer('amount');
            $table->integer('rate');
            $table->timestamps();
            $table->string('country')->default('');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction_tables');
    }
};
