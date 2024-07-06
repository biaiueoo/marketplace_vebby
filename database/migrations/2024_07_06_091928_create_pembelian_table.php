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
        Schema::create('pembelian', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kantor_id');
            $table->unsignedBigInteger('menu_id');
            $table->integer('jumlah_porsi');
            $table->date('tanggal_pengiriman');
            $table->string('total_harga');
            $table->timestamps();
            
            $table->foreign('kantor_id')->references('id')->on('kantor')->onDelete('cascade');
            $table->foreign('menu_id')->references('id')->on('menu')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembelian');
    }
};