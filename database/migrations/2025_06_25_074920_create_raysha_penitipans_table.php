<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('raysha_penitipans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('owner_id')->constrained('raysha_owners')->onDelete('cascade');
            $table->foreignId('pet_id')->constrained('raysha_pets')->onDelete('cascade');
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->string('status')->default('aktif'); // aktif / selesai / batal
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('raysha_penitipans');
    }
};
