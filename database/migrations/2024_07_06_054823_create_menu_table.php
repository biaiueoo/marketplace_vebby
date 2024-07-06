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
        Schema::create('menu', function (Blueprint $table) {
            $table->id();
            $table->string('nama_menu');
            $table->string('deskripsi_menu');
            $table->integer('harga_menu');
            $table->string('foto');
            $table->unsignedBigInteger('merchant_id'); // Tambahkan kolom merchant_id
            $table->timestamps();

            // Definisikan foreign key constraint
            $table->foreign('merchant_id')->references('id')->on('merchant')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('menu', function (Blueprint $table) {
            $table->dropForeign(['merchant_id']);
        });

        Schema::dropIfExists('menu');
    }
};
