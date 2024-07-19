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
        //
        Schema::create('home', function (Blueprint $table) {
            $table->id();
            $table->string('hero');
            $table->longText('deskripsi');
            $table->string('foto1');
            $table->string('foto2');
            $table->string('foto3');

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
