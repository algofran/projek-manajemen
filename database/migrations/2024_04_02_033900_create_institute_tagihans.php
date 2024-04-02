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
        Schema::create('institute_tagihans', function (Blueprint $table) {
            $table->id();
            $table->integer('id_inst');
            $table->string('uraian', 100);
            $table->text('user_id');
            $table->date('date')->nullable();
            $table->string('tagihan', 100);
            $table->tinyInteger('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('institute_tagihans');
    }
};
