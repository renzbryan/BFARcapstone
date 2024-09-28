<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('iar_tbl', function (Blueprint $table) {
            $table->string('iar_number', 255)->change(); 
        });
    }

    public function down()
    {
        Schema::table('iar_tbl', function (Blueprint $table) {
            $table->integer('iar_number')->change(); // Revert back to INTEGER in case of rollback
        });
    }
};
