<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBukusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bukus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('file');
            $table->string('isbn');
            $table->string('judul_buku');
            $table->unsignedBigInteger('penulis_id');
            $table->foreign('penulis_id')->references('id')->on('penulis');
            $table->unsignedBigInteger('penerbit_id');
            $table->foreign('penerbit_id')->references('id')->on('penerbits');   
            $table->unsignedBigInteger('jenisbuku_id');
            $table->foreign('jenisbuku_id')->references('id')->on('jenisbukus');   
            $table->unsignedBigInteger('suplier_id');
            $table->foreign('suplier_id')->references('id')->on('supliers');  
            $table->integer('tahun_terbit');
            $table->integer('harga_beli');
            $table->integer('harga_jual');
            $table->string('rak_buku');
            $table->string('jumlah_stok');
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
        Schema::dropIfExists('bukus');
    }
}
