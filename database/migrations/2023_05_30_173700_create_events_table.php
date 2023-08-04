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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_user')->unsigned();
            $table->foreign('id_user')->references('id')->on('users');
            $table->string('nama_event');
            $table->date('tgl_mulai');
            $table->integer('jumlah_peserta');
            $table->string('pemateri');
            $table->string('nilai_pemateri');
            $table->string('undangan');
            $table->string('nilai_undangan');
            $table->integer('biaya_pengeluaran');
            $table->integer('biaya_pendapatan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
