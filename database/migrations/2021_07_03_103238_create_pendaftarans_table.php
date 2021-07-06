<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendaftaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendaftarans', function (Blueprint $table) {
            $table->increments('id_daftar');
            $table->string('no_id', 20);
            $table->string('nama', 100);
            $table->enum('jk', ['L', 'P']);
            $table->string('tmp_lahir', 100);
            $table->date('tgl_lahir');
            $table->text('alamat');
            $table->string('no_hp', 20);
            $table->date('tgl_daftar');
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
        Schema::dropIfExists('pendaftarans');
    }
}
