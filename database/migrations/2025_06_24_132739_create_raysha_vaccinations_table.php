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
        Schema::create('raysha_vaccinations', function (Blueprint $table) {
    $table->id();
    $table->string('pet_name');
    $table->string('vaccine_type');
    $table->date('vaccination_date');
    $table->text('notes')->nullable();
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('raysha_vaccinations');
    }
};
