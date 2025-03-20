<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnPengaduan extends Migration
{
    public function up(): void
    {
        Schema::table('pengaduan', function (Blueprint $table) {
            if (!Schema::hasColumn('pengaduan', 'tempat_lahir_korban')) {
                $table->string("tempat_lahir_korban")->nullable();
                $table->string("tempat_lahir_pelaku")->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pengaduan', function (Blueprint $table) {
            if (Schema::hasColumn('pengaduan', 'lahir_korban')) {
                $table->dropColumn("tempat_lahir_korban");
                $table->dropColumn("tempat_lahir_pelaku");
            }
        });
    }
}
