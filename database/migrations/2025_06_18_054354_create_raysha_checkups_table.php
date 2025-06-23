<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
     public function up() {
        Schema::create('raysha_checkups', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pet_id')->constrained('raysha_pets')->onDelete('cascade');
            $table->foreignId('vet_id')->constrained('raysha_vets')->onDelete('cascade');
            $table->date('date');
            $table->text('diagnosis');
            $table->text('treatment');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('raysha_checkups');
    }
};
