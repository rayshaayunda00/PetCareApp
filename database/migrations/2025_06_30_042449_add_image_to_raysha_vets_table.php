<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
public function up()
{
    Schema::table('raysha_vets', function (Blueprint $table) {
        $table->string('image')->nullable()->after('phone');
    });
}

public function down()
{
    Schema::table('raysha_vets', function (Blueprint $table) {
        $table->dropColumn('image');
    });
}

};
