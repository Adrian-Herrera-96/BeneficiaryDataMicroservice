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
        Schema::create('persons', function (Blueprint $table) {
            $table->id();

            // Llaves foráneas y relaciones
            $table->unsignedBigInteger('affiliate_state_id')->nullable()->index();
            $table->foreign('affiliate_state_id')->references('id')->on('public.affiliate_states');

            $table->unsignedBigInteger('city_birth_id')->nullable()->index();
            $table->foreign('city_birth_id')->references('id')->on('public.cities');

            $table->unsignedBigInteger('pension_entity_id')->nullable()->index();
            $table->foreign('pension_entity_id')->references('id')->on('public.pension_entities');

            $table->unsignedBigInteger('financial_entity_id')->nullable()->index();
            $table->foreign('financial_entity_id')->references('id')->on('public.financial_entities');

            // Campos de la persona
            $table->string('first_name',255)->nullable();
            $table->string('second_name',255)->nullable();
            $table->string('last_name')->nullable();
            $table->string('mothers_last_name')->nullable();
            $table->string('surname_husband')->nullable();
            $table->string('identity_card');
            $table->date('due_date')->nullable();
            $table->boolean('is_duedate_undefined')->default(false);
            $table->enum('gender', ['M', 'F']);
            $table->enum('civil_status', ['C', 'S', 'V', 'D']);
            $table->date('birth_date')->nullable();
            $table->date('date_death')->nullable();
            $table->string('death_certificate_number')->nullable();
            $table->string('reason_death')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('cell_phone_number')->nullable();
            $table->unsignedBigInteger('nua')->nullable();
            $table->bigInteger('account_number')->nullable();
            $table->enum('sigep_status', ['ACTIVO', 'ELABORADO', 'VALIDADO', 'SIN REGISTRO', 'REGISTRO OBSERVADO', 'ACTIVO-PAGO-VENTANILLA'])->nullable();
            $table->integer('id_person_senasir')->nullable()->unique();
            $table->date('date_last_contribution')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('persons');
    }
};
