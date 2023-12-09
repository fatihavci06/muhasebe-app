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
            $table->integer('pencil_id');
            $table->integer('amount');
            $table->double('price');
            $table->integer('kdv');
            $table->double('subtotal');
            $table->double('kdvtotal');
            $table->double('total');
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
