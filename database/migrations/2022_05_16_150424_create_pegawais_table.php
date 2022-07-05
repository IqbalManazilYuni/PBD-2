<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePegawaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pegawais', function (Blueprint $table) {
            $table->id()->unique();
            $table->unsignedBigInteger('pendidikans_id');
            $table->foreign('pendidikans_id')->references('id')->on('pendidikans')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->string('namapegawai');
            $table->string('posisi');
            $table->string('keahlian');
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
        Schema::dropIfExists('pegawais');
    }
}
