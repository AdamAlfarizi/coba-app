<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratKematiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_kematian', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pengaju');
            $table->string('nama_yang_meninggal');
            $table->string('no_ktp_yang_meninggal');
            $table->date('tgl_meninggal');
            $table->string('jenis_kelamin_yang_meninggal');
            $table->string('tempat_meninggal');
            $table->string('tempat_pemakaman');
            $table->string('alamat_yang_meninggal');
            $table->string('kewarganegaraan_yang_meninggal');
            $table->string('image1')->nullable();
            $table->string('image2')->nullable();
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
        Schema::dropIfExists('surat_kematian');
    }
}
