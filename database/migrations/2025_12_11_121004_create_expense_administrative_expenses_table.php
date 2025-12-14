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
        Schema::create('expense_administrative_expenses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained();
            $table->decimal('amount', 10, 2);
            $table->string('month');
            $table->text('description')->nullable();
            $table->foreignId('added_by')->constrained('users');
            $table->date('expense_date');
            $table->enum('payment_method',['cash', 'bank', 'online','card']);
            $table->enum('payment_status',['pending', 'paid', 'failed','refunded']);
            $table->timestamps();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expense_administrative_expenses');
    }
};
