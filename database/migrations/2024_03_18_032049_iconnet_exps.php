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
        Schema::create('iconnet_exps', function (Blueprint $table) {
            $table->id();
            $table->integer('iconnet_id');
            $table->integer('task_id')->default(0);
            $table->text('comment')->default('-');
            $table->string('subject', 200)->default('-');
            $table->date('date');
            $table->double('cost')->default(0);
            $table->integer('user_id')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('iconnet_exps');
    }
};
