<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengaduansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengaduan', function (Blueprint $table) {
            $table->id();
            $table->string("nomor")->nullable();
            $table->date("tanggal_registrasi")->nullable();
            $table->string("petugas_penerima")->nullable();
            $table->string("petugas_menangani")->nullable();
            $table->enum("jenis_aduan",["KDRT", "NON KDRT"])->nullable();
            $table->string("nama_pelapor")->nullable();
            $table->enum("jenis_kelamin_pelapor",["Laki-Laki","Perempuan"])->nullable();
            $table->text("alamat_pelapor")->nullable();
            $table->string("hp_pelapor")->nullable();
            $table->string("hubungan_korban")->nullable();

            $table->string("nama_korban")->nullable();
            $table->string("nama_alias_korban")->nullable();
            $table->Integer("nik_korban")->nullable();
            $table->enum("jenis_kelamin_korban",["Laki-Laki","Perempuan"])->nullable();
            $table->string("lahir_korban")->nullable();
            $table->Integer("usia_korban")->nullable();
            $table->text("alamat_korban")->nullable();
            $table->string("kelurahan_korban")->nullable();
            $table->string("kecamatan_korban")->nullable();
            $table->enum("pendidikan_korban",["SD","SMP","SMA","S1","S2","S3"])->nullable();
            $table->string("suku_korban")->nullable();
            $table->string("agama_korban")->nullable();
            $table->string("kewarganegaraan_korban")->nullable();
            $table->string("pekerjaan_korban")->nullable();
            $table->string("jenis_kekerasan1")->nullable();
            $table->string("jenis_kekerasan2")->nullable();
            $table->string("jenis_kekerasan3")->nullable();

            $table->string("nama_pelaku")->nullable();
            $table->string("jenis_kelamin_pelaku")->nullable();
            $table->string("lahir_pelaku")->nullable();
            $table->string("usia_pelaku")->nullable();
            $table->string("alamat_pelaku")->nullable();
            $table->enum("pendidikan_pelaku",["SD","SMP","SMA","S1","S2","S3"])->nullable();
            $table->string("agama_pelaku")->nullable();
            $table->string("suku_pelaku")->nullable();
            $table->string("pekerjaan_pelaku")->nullable();
            
            $table->string("tempat_kejadian_perkara")->nullable();
            $table->string("kdrt_nonkdrt")->nullable();
            $table->text("kronologis")->nullable();
            $table->string("status")->nullable();
            $table->text("keterangan")->nullable();
            $table->string("tandatangan_pelapor")->nullable();
            $table->text("dokumen")->nullable();
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
        Schema::dropIfExists('pengaduan');
    }
}
