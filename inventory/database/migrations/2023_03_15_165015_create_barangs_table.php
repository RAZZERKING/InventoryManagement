<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barangs', function (Blueprint $table) {
            $table->string('no_barang')->unique()->primary();
            $table->date('tanggal_masuk');
            $table->string('kondisi')->default('baik');
            $table->string('status')->default('tersedia');
            $table->string('lokasi')->default('gudang');
            $table->string('sumber')->nullable();
            $table->string('nama_kode_barang');
            $table->foreign('nama_kode_barang')->references('kode_barang')->on('namas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barangs');
    }
};
