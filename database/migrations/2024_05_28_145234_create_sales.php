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
        Schema::create('sales', function (Blueprint $table) {
            $table->id('id');
            $table->string('pembeli', 150);
            $table->text('keterangan');
            $table->double('beli');
            $table->double('jual');
            $table->date('tgl');
            $table->tinyInteger('user');
            $table->tinyInteger('status')->default(0)->comment('0=blm bayar,1=lunas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
