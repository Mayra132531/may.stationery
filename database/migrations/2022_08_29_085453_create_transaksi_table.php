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
            $table->bigIncrements('id_transaksi');
            $table->unsignedBigInteger('id');
            $table->unsignedBigInteger('id_order');
            $table->enum('jenis_pmbyr', ['atm', 'cod']);
            $table->enum('status', ['sudah', 'belum']);
            
            $table->foreign('id')->references('id')->on('produk')->onDelete('cascade');
            $table->foreign('id_order')->references('id_order')->on('order')->onDelete('cascade');

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
