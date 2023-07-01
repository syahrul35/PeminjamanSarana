<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pengajuans', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_event')->unsigned();
            $table->foreign('id_event')->references('id')->on('events');
            $table->bigInteger('id_sarpras')->unsigned();
            $table->foreign('id_sarpras')->references('id')->on('sarpras');
            $table->bigInteger('id_user')->unsigned();
            $table->foreign('id_user')->references('id')->on('users');
            // $table->dateTime('tgl_peminjaman');
            // $table->dateTime('tgl_pengembalian');
            $table->tinyInteger('status_pengajuan')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuans');
    }
};
