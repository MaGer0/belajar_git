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
        Schema::create('packaging', function (Blueprint $table) {
            $table->id();
            $table->integer('unit_id');
            $table->string('code');
            $table->string('name');
            $table->string('material');
            $table->boolean('is_waterproof');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packaging');
    }
};
