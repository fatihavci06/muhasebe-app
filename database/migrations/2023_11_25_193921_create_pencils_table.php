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
        Schema::create('pencils', function (Blueprint $table) {
            $table->id();
            $table->integer('pencil_type')->default(0); // 0 ise gelir kalemi , 1 ise gider kalemi
            $table->string('name');
            $table->integer('kdv');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pencils');
    }
};
