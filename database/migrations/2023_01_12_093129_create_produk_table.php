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
        Schema::create('produk', function (Blueprint $table) {
            $table->string('kd_produk', 15)->primary()->unique();
            $table->string('nm_produk', 99);
            $table->integer('kategori');
            $table->integer('stok');
            $table->string('jenis_masakan', 99);
            $table->integer('jumlah_produk');
            $table->integer('berat_produk');
            $table->string('masa_penyimpanan', 99);
            $table->integer('harga');
            $table->text('ket');
            $table->string('status')->default(1);


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
        Schema::dropIfExists('produks');
    }
};
