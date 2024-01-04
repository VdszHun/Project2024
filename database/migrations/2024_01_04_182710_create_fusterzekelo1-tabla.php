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
        Schema::create('fusterzekelo1-tabla', function (Blueprint $table) {
            $table->id("f1_id");
            $table->integer('f1_legminoseg');
            $table->float('f1_hofok',4,2);
            $table->integer('f1_paratartalom');
            $table->dateTime('f1_meres_ideje');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fusterzekelo1-tabla');
    }
};
