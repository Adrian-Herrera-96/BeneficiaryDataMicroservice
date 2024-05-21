<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
        return [
            'affiliate_state_id' => $this->faker->optional()->numberBetween(1, 9),
            'city_birth_id' => $this->faker->optional()->numberBetween(1, 11),
            'pension_entity_id' => $this->faker->optional()->numberBetween(1, 5),
            'financial_entity_id' => $this->faker->optional()->numberBetween(1, 8),
            'first_name' => $this->faker->optional()->firstName(),
            'second_name' => $this->faker->optional()->firstName(),
            'last_name' => $this->faker->optional()->lastName(),
            'mothers_last_name' => $this->faker->optional()->lastName(),
            'surname_husband' => $this->faker->optional()->lastName(),
            'identity_card' => $this->faker->unique()->numerify('########'),
            'due_date' => $this->faker->optional()->date(),
            'is_duedate_undefined' => $this->faker->boolean(),
            'gender' => $this->faker->randomElement(['M', 'F']),
            'civil_status' => $this->faker->randomElement(['C', 'S', 'V', 'D']),
            'birth_date' => $this->faker->optional()->date(),
            'date_death' => $this->faker->optional()->date(),
            'death_certificate_number' => $this->faker->optional()->numerify('DCN#######'),
            'reason_death' => $this->faker->optional()->sentence(),
            'phone_number' => $this->faker->optional()->phoneNumber(),
            'cell_phone_number' => $this->faker->optional()->phoneNumber(),
            'nua' => $this->faker->optional()->numerify('#########'),
            'account_number' => $this->faker->optional()->randomNumber(8),
            'sigep_status' => $this->faker->optional()->word(),
            'id_person_senasir' => $this->faker->optional()->randomNumber(),
            'date_last_contribution' => $this->faker->optional()->date(),
            'created_at' => now(),
            'updated_at' => now(),
            'deleted_at' => $this->faker->optional()->dateTime(),
        ];
    }
}
