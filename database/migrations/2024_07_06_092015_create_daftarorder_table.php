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
        Schema::create('daftarorder', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kantor_id');
            $table->unsignedBigInteger('invoice_id');
            $table->timestamps();
            
            $table->foreign('kantor_id')->references('id')->on('kantor')->onDelete('cascade');
            $table->foreign('invoice_id')->references('id')->on('invoice')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daftaroder');
    }
};