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
        Schema::create('wewenangs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_wewenang');
            $table->string('jabatan_wewenang');
            $table->integer('telp_wewenang', 13);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wewenangs');
    }
};
