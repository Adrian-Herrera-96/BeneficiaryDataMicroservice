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
        Schema::create('beneficiaries.state_types', function (Blueprint $table) {
            $table->id()->comment("Campo donde se almacena el ID de la tabla");
            $table->string('name')->comment("Campo donde se almacena el tipo del estado de los afiliados");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('state_types');
    }
};
