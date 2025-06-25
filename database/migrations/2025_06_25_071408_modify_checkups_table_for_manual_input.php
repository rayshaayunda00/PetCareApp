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
        Schema::table('raysha_checkups', function (Blueprint $table) {
        $table->dropForeign(['pet_id']);
        $table->dropForeign(['vet_id']);
        $table->dropColumn(['pet_id', 'vet_id']);

        $table->string('pet_name')->after('id');
        $table->string('species')->after('pet_name');
        $table->string('vet_name')->after('species');
        $table->string('specialization')->after('vet_name');
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
