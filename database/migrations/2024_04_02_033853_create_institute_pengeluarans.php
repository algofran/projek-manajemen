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
        Schema::create('institute_pengeluarans', function (Blueprint $table) {
            $table->id();
            $table->integer('id_inst');
            $table->integer('task_id')->default(0);
            $table->text('comment');
            $table->string('subject', 200);
            $table->date('date');
            $table->double('cost')->default(0);
            $table->integer('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('institute_pengeluarans');
    }
};
