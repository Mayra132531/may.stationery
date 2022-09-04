<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_pembeli');
            $table->unsignedBigInteger('id_produk');
            $table->unsignedBigInteger('id_order');
            $table->string('total_transaksi');
            $table->enum('jenis_pmbyr', ['atm', 'cod']);
            $table->enum('status_byr', ['sudah', 'belum']);
            $table->string('ket');
            
            $table->foreign('id_pembeli')->references('id')->on('pembeli');
            $table->foreign('id_produk')->references('id')->on('produk');
            $table->foreign('id_order')->references('id')->on('order');

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
        Schema::dropIfExists('transaksi');
    }
}
