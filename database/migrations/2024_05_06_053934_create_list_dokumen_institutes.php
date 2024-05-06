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
        Schema::create('list_dokumen_perusahaans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_inst');
            $table->foreign('id_inst')->references('id')->on('mitra_institutes')->onDelete('cascade');
            $table->unsignedBigInteger('id_dokumen');
            $table->foreign('id_dokumen')->references('id')->on('dokumens')->onDelete('cascade');
            $table->year('tahun');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('list_dokumen_perusahaans');
    }
};
