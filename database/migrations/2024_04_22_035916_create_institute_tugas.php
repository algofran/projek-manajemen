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
        Schema::create('institute_tugas', function (Blueprint $table) {
            $table->id();
            $table->integer('id_inst');
            $table->string('task', 200);
            $table->text('description');
            $table->tinyInteger('status');
            $table->date('date_created')->nullable();
            $table->date('due_date')->nullable();
            $table->text('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('institute_tugas');
    }
};
