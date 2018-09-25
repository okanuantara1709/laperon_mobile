<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properti', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_properti');
            $table->integer('kategori_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->text('deskripsi');
            $table->text('alamat');
            $table->integer('harga');
            $table->string('lat');
            $table->string('lng');
            $table->timestamps();

            $table->foreign('kategori_id')
                    ->references('id')->on('kategori')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            
            $table->foreign('user_id')
                    ->references('id')->on('user')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('properti');
    }
}
