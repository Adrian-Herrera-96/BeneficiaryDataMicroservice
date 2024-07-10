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
        Schema::create('person_affiliate', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('person_id');
            $table->string('type',255);
            $table->bigInteger('type_id');
            $table->bigInteger('kinship_type');
            $table->boolean('state');

            $table->timestamps();

            // Añadiendo relaciones
            $table->foreign('person_id')->references('id')->on('persons');
            $table->foreign('kinship_type')->references('id')->on('public.kinships');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('person_affiliate');
    }
};
