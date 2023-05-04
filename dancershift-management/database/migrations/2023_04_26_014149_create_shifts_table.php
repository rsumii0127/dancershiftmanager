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
        Schema::create('shifts', function (Blueprint $table) {
            $table->id('shift_id');
            $table->unsignedBigInteger('dancer_id');
            $table->foreign('dancer_id')->references('dancer_id')->on('dancers')->onUpdate('restrict')->onDelete('restrict');
            $table->text('show_name');
            $table->text('position')->nullable();
            $table->date('date');
            $table->boolean('onoff');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shifts');
    }
};
