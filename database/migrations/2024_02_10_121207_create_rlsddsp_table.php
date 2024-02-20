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
        Schema::create('rlsddsp', function (Blueprint $table) {
            $table->id('rlsddsp_id');
            $table->integer('item_id');
            $table->string('rlsddsp_dept');
            $table->string('rlsddsp_acc_offcr');
            $table->string('rlsddsp_desg');
            $table->boolean('rlsddsp_pol');
            $table->string('rlsddsp_pol_sta');
            $table->date('rlsddsp_pol_date');
            $table->string('rlsddsp_no');
            $table->date('rlsddsp_date');
            $table->integer('ics_id');
            $table->string('ics_no');
            $table->date('ics_date');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rlsddsp');
    }
};
