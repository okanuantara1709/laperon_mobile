<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVaksinTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vaksin', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_vaksin');
            $table->string('kategori');
            $table->integer('bulan_0');
            $table->integer('bulan_1');
            $table->integer('bulan_2');
            $table->integer('bulan_3');
            $table->integer('bulan_4');
            $table->integer('bulan_5');
            $table->integer('bulan_6');
            $table->integer('bulan_7');
            $table->integer('bulan_8');
            $table->integer('bulan_9');
            $table->integer('bulan_10');
            $table->integer('bulan_11');
            $table->integer('bulan_12');
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
        Schema::dropIfExists('vaksin');
    }
}
