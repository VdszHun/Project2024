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
        Schema::create('helyszinek', function (Blueprint $table) {
            $table->id("h_id");
            $table->integer('terem_szint');
            $table->string('terem_descript');
            $table->ipAddress('eszköz_ip');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('helyszinek');
    }
};
