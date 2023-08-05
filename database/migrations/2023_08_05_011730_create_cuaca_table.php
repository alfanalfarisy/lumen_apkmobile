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
        Schema::create('cuaca', function (Blueprint $table) {
            $table->string('kec_id');
            $table->datetime('date');
            $table->string('tmin');
            $table->string('tmax');
            $table->string('humin');
            $table->string('humax');
            $table->string('hu');
            $table->string('t');
            $table->string('weather');
            $table->string('wd');
            $table->string('ws');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cuaca');
    }
};
