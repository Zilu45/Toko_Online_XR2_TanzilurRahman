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
        Schema::create('payment_detail', function (Blueprint $table) {
            $table->integer("id")->autoIncrement();
            $table->integer("payment_id");
            $table->integer("nama_barang");
            $table->integer("stok");
            $table->timestamps();

            $table->foreign('payment_id')->references('id')->on('payment');
            $table->foreign('nama_barang')->references('id')->on('barang');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_detail');
    }
};
