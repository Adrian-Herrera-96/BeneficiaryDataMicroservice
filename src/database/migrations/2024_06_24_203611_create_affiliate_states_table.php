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
        Schema::create('affiliate_states', function (Blueprint $table) {
            $table->bigIncrements('id')->comment("identificador del registro");
            $table->bigInteger('state_type_id')->comment("FK tipo de estado de los afiliados");
            $table->string('name')->comment("Nombre de estado de afiliado");
            $table->timestamps();

            $table->foreign('state_type_id')->references('id')->on('state_types');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('affiliate_states');
    }
};
