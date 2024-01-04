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
        Schema::create('fusterzekelo2-tabla', function (Blueprint $table) {
            $table->id("f2_id");
            $table->integer('f2_legminoseg');
            $table->float('f2_hofok',4,2);
            $table->integer('f2_paratartalom');
            $table->dateTime('f2_meres_ideje');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fusterzekelo2-tabla');
    }
};
