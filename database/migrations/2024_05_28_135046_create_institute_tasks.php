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
        Schema::create('institute_tasks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('project_id');
            $table->foreign('project_id')->references('id')->on('institute_proyeks');
            $table->string('task', 200);
            $table->text('description');
            $table->tinyInteger('status');
            $table->date('date_created')->nullable();
            $table->date('due_date')->nullable();
            $table->text('user_id');
            $table->timestamps();
        });

        Schema::create('institute_pengeluarans', function (Blueprint $table) {

            $table->id();
            $table->unsignedBigInteger('project_id');
            $table->unsignedBigInteger('id_inst');
            $table->foreign('project_id')->references('id')->on('institute_proyeks');
            $table->text('comment');
            $table->string('subject', 200);
            $table->date('date');
            $table->double('cost');
            $table->text('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('institute_tasks');
        Schema::dropIfExists('institute_pengeluarans');
    }
};
