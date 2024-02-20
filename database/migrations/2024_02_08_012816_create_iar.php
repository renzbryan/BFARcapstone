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
        Schema::create('iar_tbl', function (Blueprint $table) {
            $table->id('iar_id');
            $table->string('iar_entityname')->nullable();
            $table->string('iar_fundcuster')->nullable();
            $table->string('iar_supplier')->nullable();
            $table->string('iar_Podate')->nullable(); 
            // requisitioning office
            $table->string('iar_rod')->nullable();
            // responsibility center code
            $table->string('iar_rcc')->nullable();
            $table->integer('iar_number')->nullable();
            $table->date('iar_date')->nullable();
            $table->integer('iar_invoice')->nullable();
            $table->integer('iar_invoice_d')->nullable();
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('iar');
    }
};
