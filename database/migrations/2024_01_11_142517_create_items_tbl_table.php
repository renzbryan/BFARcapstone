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
        Schema::create('items_tbl', function (Blueprint $table) {
            $table->id('item_id');
            $table->string('item_name');
            $table->string('item_desc');
            $table->string('item_unit');
            $table->integer('item_quantity');
            $table->string('item_forms')->nulalble();
            $table->integer('iar_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items_tbl');
    }
};
