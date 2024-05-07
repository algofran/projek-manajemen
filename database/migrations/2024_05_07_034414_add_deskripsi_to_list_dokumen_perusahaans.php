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
        Schema::table('list_dokumen_perusahaans', function (Blueprint $table) {
            $table->string('deskripsi')->after('id_dokumen');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('list_dokumen_perusahaans', function (Blueprint $table) {
            //
        });
    }
};
