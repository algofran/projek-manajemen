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
        Schema::create('institute_proyeks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_inst');
            $table->foreign('id_inst')->references('id')->on('institute_mitras');
            $table->string('periode', 20)->default('202401');
            $table->integer('paket');
            $table->string('sektor', 45)->default('TOPOYO');
            $table->string('keterangan', 45)->default('TOPOYO');
            $table->integer('PA')->default(0);
            $table->date('start_date')->default(now());
            $table->date('end_date')->nullable();
            $table->double('tagihan')->default(0);
            $table->string('bank');
            $table->unsignedTinyInteger('status')->default(0)->comment('0=hold, 1=onprogress, 2=complete');
            $table->unsignedTinyInteger('payment')->default(0)->comment('0=belum, 1=proses, 2=terbayar');
            $table->unsignedBigInteger('manager_id');
            $table->foreign('manager_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('institute_proyeks');
    }
};
