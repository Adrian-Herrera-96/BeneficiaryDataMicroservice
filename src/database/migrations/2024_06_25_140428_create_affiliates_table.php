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
        Schema::create('affiliates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('registration',255)->nullable();
            $table->string('type',255)->nullable();
            $table->date('date_entry')->nullable();
            $table->date('date_derelict')->nullable();
            $table->string('reason_derelict',255)->nullable();
            $table->integer('service_years')->nullable();
            $table->integer('service_months')->nullable();
            $table->text('unit_police_description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('affiliates');
    }
};
