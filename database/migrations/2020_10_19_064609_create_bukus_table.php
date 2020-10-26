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
            $table->string('judul');
            $table->unsignedBigInteger('id_penulis');
            $table->foreign('id_penulis')->references('id')->on('penulis');
            $table->unsignedBigInteger('id_penerbit');
            $table->foreign('id_penerbit')->references('id')->on('penerbits');   
            $table->unsignedBigInteger('id_jenisbuku');
            $table->foreign('id_jenisbuku')->references('id')->on('jenisbukus');   
            $table->unsignedBigInteger('id_suplier');
            $table->foreign('id_suplier')->references('id')->on('supliers');  
            $table->integer('tahun_terbit');
            $table->integer('harga_beli');
            $table->integer('harga_jual');
            $table->string('lokasi');
            $table->string('jumlah');
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
