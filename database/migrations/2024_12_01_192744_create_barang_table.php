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
        Schema::create('barang', function (Blueprint $table) {
            $table->integer("id")->autoIncrement();
            $table->string("barang",2233);
            $table->float("stok");
            $table->string("harga");
            $table->string("kondisi");
            $table->integer("barang_id");
            $table->timestamps();

            $table->foreign('barang_id')->references('id')->on('category');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang');
    }
};