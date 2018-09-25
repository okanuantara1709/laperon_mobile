<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePendataanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendataan', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('bayi_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->timestamp('tgl_pendataan');
            $table->string('berat_badan');
            $table->string('panjang_badan');
            $table->string('lingkar_kepala');
            $table->integer('vaksin_id')->nullable()->unsigned();
            $table->timestamps();

            $table->foreign('bayi_id')
                    ->references('id')
                    ->on('bayi')
                    ->onDelete('cascade');

            $table->foreign('user_id')
                    ->references('id')
                    ->on('user')
                    ->onDelete('cascade');

            $table->foreign('vaksin_id')
                    ->references('id')
                    ->on('vaksin')
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
        Schema::dropIfExists('pendataan');
    }
}
