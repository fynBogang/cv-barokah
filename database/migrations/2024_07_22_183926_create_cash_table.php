<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCashTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cash', function (Blueprint $table) {
            $table->id();
            $table->string('nama_user', 50);
            $table->string('nama_barang', 50);
            // $table->bigInteger('user_id')->unsigned();
            // $table->foreign('user_id')->references('id')->on('users');
            // $table->bigInteger('barang_id')->unsigned();
            // $table->foreign('barang_id')->references('id')->on('barang');
            $table->integer('jmlmasuk');
            $table->integer('harga');
            $table->timestamp('waktu');
            // $table->integer('total')->nullable();
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
        Schema::dropIfExists('cash');
    }
}