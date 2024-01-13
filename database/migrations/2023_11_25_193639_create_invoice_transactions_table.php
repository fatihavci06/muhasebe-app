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
        Schema::create('invoice_transactions', function (Blueprint $table) {
            $table->id();
            $table->integer('invvoice_id');
            $table->integer('pencil_id')->nullable();
            $table->integer('amount')->nullable();
            $table->double('price')->nullable();
            $table->integer('kdv')->nullable();
            $table->double('subtotal')->nullable();
            $table->double('kdvtotal')->nullable();
            $table->double('total')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoice_transactions');
    }
};
