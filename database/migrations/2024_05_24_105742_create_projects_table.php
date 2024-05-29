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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name', 200);
            $table->text('description')->nullable();
            $table->tinyInteger('status');
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->text('user_ids');
            $table->string('po_number', 100)->nullable();
            $table->tinyInteger('payment_status')->default(0);
            $table->double('payment')->default(0);
            $table->tinyInteger('pembayaran')->default(0);
            $table->integer('vendor')->default(0);
            $table->text('fakturpajak')->nullable();
            $table->date('fp_date')->nullable();
            $table->text('invoice')->nullable();
            $table->date('inv_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
