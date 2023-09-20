<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJenisKekerasanPengaduansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jenis_kekerasan_pengaduan', function (Blueprint $table) {
            $table->id();
            $table->foreignId("jenis_kekerasan_id")->constrained("jenis_kekerasan");
            $table->foreignId("pengaduan_id")->constrained("pengaduan");
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
        Schema::dropIfExists('jenis_kekerasan_pengaduan');
    }
}
