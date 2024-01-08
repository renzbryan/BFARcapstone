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
            $table->id();
            $table->string('item_name');
            $table->string('description');
            $table->string('unit');
            $table->integer('quantity');
            $table->string('forms');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('iar_tbl');
    }
};
