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
        Schema::create('tbl_iconnets', function (Blueprint $table) {
            $table->id();
            $table->string('periode', 20)->default('202401');
            $table->string('sektor', 45)->default('TOPOYO');
            $table->integer('PA')->default(0);
            $table->double('tagihan')->default(0);
            $table->unsignedTinyInteger('status')->default(0)->comment('0=hold, 1=onprogress, 2=complete');
            $table->unsignedTinyInteger('payment')->default(0)->comment('0=belum, 1=proses, 2=terbayar');
            $table->unsignedInteger('manager_id')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_iconnets');
    }
};
