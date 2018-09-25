<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBayiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bayi', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_bayi');
            $table->string('tempat_lahir');
            $table->date('tgl_lahir');
            $table->string('golongan_darah');
            $table->string('agama');
            $table->integer('ibu_id')->unsigned();;
            $table->integer('bapak_id')->unsigned();;
            $table->timestamps();

            $table->foreign('ibu_id')
                    ->references('id')
                    ->on('orang_tua')
                    ->onDelete('cascade');

            $table->foreign('bapak_id')
                    ->references('id')
                    ->on('orang_tua')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bayi');
    }
}
