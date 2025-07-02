<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('raysha_checkups', function (Blueprint $table) {
            $table->string('doctor_name')->nullable()->after('treatment');
        });
    }

    public function down(): void
    {
        Schema::table('raysha_checkups', function (Blueprint $table) {
            $table->dropColumn('doctor_name');
        });
    }
};
