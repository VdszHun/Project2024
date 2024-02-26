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
        Schema::create('meresek', function (Blueprint $table) {
            $table->id("m_id");
            $table->foreignId('h_id')->references('h_id')->on('helyszinek')->onDelete('cascade')->onUpdate('cascade');
            //$table->string('h_id')->unique();
            $table->integer('ppm');
            $table->float('homerseklet',4,2);
            $table->integer('paratartalom');
            $table->integer('hibakod');
            $table->dateTime('meres_ideje');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meresek');
    }
};
