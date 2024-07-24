<?php

namespace Database\Factories;

use App\Models\Person;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Person>
 */
class PersonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $financialEntityIds = DB::table('public.financial_entities')->pluck('id')->toArray();
        $pensionEntityIds = DB::table('public.pension_entities')->pluck('id')->toArray();
        return [
            'city_birth_id' => $this->faker->numberBetween(1, 11),
            'pension_entity_id' => $this->faker->randomElement($pensionEntityIds),
            'financial_entity_id' => $this->faker->randomElement($financialEntityIds),
            'first_name' => $this->faker->optional()->firstName,
            'second_name' => $this->faker->optional()->firstName,
            'last_name' => $this->faker->optional()->lastName,
            'mothers_last_name' => $this->faker->optional()->lastName,
            'surname_husband' => $this->faker->optional()->lastName,
            'identity_card' => strval($this->faker->unique()->randomNumber(8)),
            'due_date' => $this->faker->date(),
            'is_duedate_undefined' => $this->faker->boolean(),
            'gender' => $this->faker->randomElement(['M', 'F']),
            'civil_status' => $this->faker->randomElement(['C', 'S', 'V', 'D']),
            'birth_date' => $this->faker->date(),
            'date_death' => $this->faker->optional()->date(),
            'death_certificate_number' => $this->faker->optional()->text(10),
            'reason_death' => $this->faker->optional()->text(50),
            'phone_number' => $this->faker->optional()->phoneNumber ? strval($this->faker->phoneNumber) : null,
            'cell_phone_number' => $this->faker->optional()->phoneNumber,
            'nua' => $this->faker->optional()->randomNumber(),
            'account_number' => $this->faker->optional()->randomNumber(8),
            'sigep_status' => $this->faker->optional()->randomElement(['ACTIVO', 'ELABORADO', 'VALIDADO', 'SIN REGISTRO', 'REGISTRO OBSERVADO', 'ACTIVO-PAGO-VENTANILLA']),
            'id_person_senasir' => $this->faker->unique()->randomNumber(),
            'date_last_contribution' => $this->faker->optional()->date(),
        ];
    }
    /**
     * Customize the factory object after it has been instantiated.
     *
     * @return $this
     */
    public function configure()
    {
        return $this->afterMaking(function (Person $person) {
            if (Person::where('id_person_senasir', $person->id_person_senasir)->exists()) {
                $person->id_person_senasir = Person::max('id_person_senasir') + 1;
            }
        });
    }
}
