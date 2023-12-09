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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->integer('customer_type')->default(0);
            $table->string('name')->nullable();
            $table->string('surname')->nullable();
            $table->string('email')->nullable();
            $table->string('photo')->nullable();
            $table->date('birthday')->nullable();
            $table->bigInteger('tc_no')->nullable();
            $table->string('adress')->nullable();
            $table->string('number')->nullable();
            $table->string('company_name')->nullable();
            $table->string('tax_number')->nullable();
            $table->string('tax_office')->nullable();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
