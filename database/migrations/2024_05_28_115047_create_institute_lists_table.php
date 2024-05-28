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
        Schema::create('institute_lists', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('institute');
            $table->string('alamat');
            $table->text('keterangan', 50)->nullable();
            $table->timestamps();
        });

        Schema::create('institute_mitras', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_inst');
            $table->foreign('id_inst')->references('id')->on('institute_lists');
            $table->string('mitra');
            $table->text('keterangan', 50)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('institute_lists');
        Schema::dropIfExists('institute_mitras');
    }
};
