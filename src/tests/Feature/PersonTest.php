<?php

use App\Models\Person;
use Carbon\Factory;

use function Pest\Laravel\post;
use function Pest\Laravel\get;
use function Pest\Laravel\postJson;
use function Pest\Laravel\putJson;

use Faker\Factory as Faker;
use Illuminate\Support\Arr;

///read
it('can list persons', function () {
    $this->withoutExceptionHandling();
    $persons = Person::factory()->count(3)->create();
    $response = get('/api/persons');
    $response->assertStatus(200);
    $responseData = $response->json('data');
    expect(count($responseData))->toBeGreaterThanOrEqual(3);
    $response->assertJsonFragment([
        'first_name' => $persons[0]->first_name,
        'last_name' => $persons[0]->last_name,
    ]);

    $response->assertJsonFragment([
        'first_name' => $persons[1]->first_name,
        'last_name' => $persons[1]->last_name,
    ]);

    $response->assertJsonFragment([
        'first_name' => $persons[2]->first_name,
        'last_name' => $persons[2]->last_name,
    ]);
});
///create
it('validates required fields to store', function(){
    $this->withoutExceptionHandling();
    $data=[
        "identity_card"=>null,
        "gender"=>null,
        "civil_status"=>null
    ];
    $response = postJson('/api/persons', $data);
    logger();
    $response->assertStatus(422)
             ->assertJsonValidationErrors([
                'identity_card',
                'gender',
                'civil_status'
             ])
             ;
});

it('validates unsignedBigInteger fields to store', function(){
    $this->withoutExceptionHandling();
    $data = [
        "nua" => 1.2,
        "account_number" => 2.2,
        "id_person_senasir" => 2.2,
        "pension_entity_id" => 2.1,
        "financial_entity_id" => 2.1
    ];
    $response = postJson('/api/persons', $data);
    $response->assertStatus(422)
             ->assertJsonValidationErrors([
                "nua",
                "account_number",
                "id_person_senasir",
                "pension_entity_id",
                "financial_entity_id"
             ]);
});
it('validates unique fields to store', function(){
    $this->withoutExceptionHandling();
    $faker = Faker::create();
    $uniqueIdentityCard = null;
    do {
        $uniqueIdentityCard = $faker->randomNumber(8);
    } while (Person::where('identity_card', $uniqueIdentityCard)->exists());
    $this->assertFalse(Person::where('identity_card', $uniqueIdentityCard)->exists());

    $data = [
        "identity_card" => $uniqueIdentityCard,
    ];

    $response = postJson('/api/persons', $data);
    $response->assertStatus(422)
             ->assertJsonValidationErrors([
                'identity_card',
             ]);
});
it('validates string fields to store', function(){
    $this->withoutExceptionHandling();
    $faker = Faker::create();

    $invalidStrings = [
        $faker->randomNumber(),   // Un número
        $faker->randomFloat(),    // Un número flotante
        $faker->boolean(),        // Un booleano
    ];
    $data = [
        "first_name" => $faker->randomElement($invalidStrings),
        "second_name" => $faker->randomElement($invalidStrings),
        "last_name" => 123,
        "mothers_last_name"=> 123,
        "surname_husband"=> 123,
        "identity_card"=> 132,
        "civil_status"=>321,
        "death_certificate_number"=>321,
        "reason_death" => 321,
        "phone_number" => 321,
        "cell_phone_number" => 321,
        "sigep_status" => 321
    ];
    $response = postJson('/api/persons', $data);
    $response->assertStatus(422)
             ->assertJsonValidationErrors([
                'first_name',
                'second_name',
                'last_name',
                'mothers_last_name',
                'surname_husband',
                'identity_card',
                'civil_status',
                'death_certificate_number',
                'reason_death',
                "phone_number",
                'sigep_status'
             ]);
});
it('validates date fields to store', function(){
    $this->withoutExceptionHandling();
    $faker = Faker::create();
    $invalidDates = [
        $faker->word,
        $faker->randomNumber(),
        '31-02-2023',
        'not-a-date'
    ];
    $data = [
        "birth_date" =>  $faker->randomElement($invalidDates),
        "due_date"=>  $faker->randomElement($invalidDates),
        "date_death" =>  $faker->randomElement($invalidDates),
        "date_last_contribution" =>  $faker->randomElement($invalidDates)
    ];
    $response = postJson('/api/persons', $data);
    $response->assertStatus(422)
             ->assertJsonValidationErrors([
                'birth_date',
                'due_date',
                'date_death'
             ]);
});
it('validates boolean fields to store', function(){
    $faker = Faker::create();

    $invalidDates = [
        $faker->randomNumber(),
        $faker->randomFloat(),
    ];
    $this->withoutExceptionHandling();
    $data = [
        "is_duedate_undefined" => $faker->randomElement($invalidDates),
    ];
    $response = postJson('/api/persons', $data);
    $response->assertStatus(422)
             ->assertJsonValidationErrors([
                'is_duedate_undefined'
             ]);
});
it('can create a person', function () {
    $this->withoutExceptionHandling();
    $data = Person::factory()->make()->toArray();

    $response = post('/api/persons', $data);
    if ($response->status() !== 201) {
        dd($response->json());
    }
    $response->assertStatus(201);
});