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
        Schema::create('dancers', function (Blueprint $table) {
            $table->id('dancer_id');
            $table->text('dancer_name');
            $table->text('performance_park');
            $table->text('performance_show_1');
            $table->text('performance_show_2')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dancers');
    }
};
