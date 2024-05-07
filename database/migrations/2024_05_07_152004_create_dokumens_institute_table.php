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
        Schema::create('dokumens_institute', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_inst');
            $table->foreign('id_inst')->references('id')->on('mitra_institutes')->onDelete('cascade');
            $table->unsignedBigInteger('id_dokumen');
            $table->foreign('id_dokumen')->references('id')->on('list_dokumen_institutes')->onDelete('cascade');
            $table->string('file_path');
            $table->string('license');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dokumens_institute');
    }
};
