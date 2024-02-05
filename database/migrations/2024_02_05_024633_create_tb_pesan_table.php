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
        Schema::create('tb_pesan', function (Blueprint $table) {
                $table->id();
                $table->timestamps();
                $table->string('id_user');
                $table->string('nama');
                $table->string('judul_film');
                $table->string('jam');
                $table->string('kursi');
                
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_pesan');
    }
};
