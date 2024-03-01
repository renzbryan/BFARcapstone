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
        Schema::create('stock_card', function (Blueprint $table) {
            $table->id('sc_id');
            $table->integer('item_id');
            $table->integer('iar_id');
            $table->integer('sc_stock_no');
            $table->string('sc_reorder_point');
            $table->date('sc_date');
            $table->string('sc_reference');
            $table->integer('sc_receipt_qty');
            $table->string('sc_issue_offc');
            $table->integer('sc_balance');
            $table->integer('sc_consume');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stock_card');
    }
};
