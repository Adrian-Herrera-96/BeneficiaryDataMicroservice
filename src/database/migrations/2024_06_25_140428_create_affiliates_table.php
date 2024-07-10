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
            $table->bigIncrements('id')->comment("Identificador del registro.");
            $table->bigInteger('affiliate_state_id')->nullable()->comment("FK Identificador de la tabla afiliate_states");
            $table->string('registration',255)->nullable()->comment("codigo de Matricula del afiliado");
            $table->string('type',255)->nullable()->comment("información si el afiliado es de COMANDO o BATALLÓN ");
            $table->date('date_entry')->nullable()->comment("fecha de ingreso a la institución policial");
            $table->date('date_derelict')->nullable()->comment("fecha de abandono a la institución policial");
            $table->string('reason_derelict',255)->nullable()->comment("registro de la causa de abandono");
            $table->integer('service_years')->nullable()->comment("Años de servicio");
            $table->integer('service_months')->nullable()->comment("Meses de servicio");
            $table->text('unit_police_description')->nullable()->comment("Descripcion de la unidad policial a pepdido de la DESI");
            $table->bigInteger('unit_id')->nullable();
            $table->bigInteger('category_id')->nullable();
            $table->bigInteger('degree_id')->nullable();
            
            $table->string('official',350)->nullable();
            $table->string('book',350)->nullable();
            $table->string('departure',350)->nullable();
            $table->date('marriage_date')->nullable();

            $table->timestamps();

            // Añadiendo relaciones
            $table->foreign("affiliate_state_id")->references('id')->on('affiliate_states');
            $table->foreign('unit_id')->references('id')->on('public.units');
            $table->foreign('category_id')->references('id')->on('public.categories');
            $table->foreign('degree_id')->references('id')->on('public.degrees');
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
