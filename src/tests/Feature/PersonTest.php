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
