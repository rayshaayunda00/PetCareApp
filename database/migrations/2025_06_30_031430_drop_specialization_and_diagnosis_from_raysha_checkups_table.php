<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('raysha_checkups', function (Blueprint $table) {
            if (Schema::hasColumn('raysha_checkups', 'specialization')) {
                $table->dropColumn('specialization');
            }

            if (Schema::hasColumn('raysha_checkups', 'diagnosis')) {
                $table->dropColumn('diagnosis');
            }
        });
    }

    public function down(): void
    {
        Schema::table('raysha_checkups', function (Blueprint $table) {
            $table->string('specialization')->nullable();
            $table->text('diagnosis')->nullable();
        });
    }
};
