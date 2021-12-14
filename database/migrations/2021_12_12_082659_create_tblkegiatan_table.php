<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblkegiatanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblkegiatan', function (Blueprint $table) {
            $table->id();
            $table->string("tanggal");
            $table->string("waktu");
            $table->string("kegiatan");
            $table->enum("status",["pending","selesai"]);
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
        Schema::dropIfExists('tblkegiatan');
    }
}
