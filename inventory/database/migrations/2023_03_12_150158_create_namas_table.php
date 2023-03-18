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
        Schema::create('namas', function (Blueprint $table) {
            $table->string('kode_barang')->unique()->primary();
            $table->string('nama_barang');
            $table->string('merk');
            $table->bigInteger('tipe_id')->unsigned();
            $table->foreign('tipe_id')->references('id')->on('tipes')->onDelete('cascade');
            $table->integer('baik')->default('0');
            $table->integer('kurang_baik')->default('0');
            $table->integer('rusak')->default('0');
            $table->integer('jumlah_barang')->default('0');
            $table->text('spesifikasi');
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
        Schema::dropIfExists('namas');
    }
};
