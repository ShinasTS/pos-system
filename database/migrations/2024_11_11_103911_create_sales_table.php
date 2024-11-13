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
            $table->id();
            $table->decimal('total');
            $table->decimal('disctotal');
            $table->decimal('pay');
            $table->decimal('balance');
            $table->date('dd');
            $table->string('mop');
            $table->unsignedBigInteger('cus_id');
            $table->boolean('status')->default(0);
            $table->foreign('cus_id')->references('id')->on('customer')->onDelete('cascade');
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
