<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePersonRequest;
use App\Http\Requests\UpdatePersonRequest;
use App\Models\Person;
use GuzzleHttp\Psr7\Response;
use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $persons = Person::all();
        return response()->json(['data' => $persons], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePersonRequest $request)
    {
    }

    /**
     * Display the specified resource.
     */
    public function show(Person $person)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePersonRequest $request, Person $person)
    {
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Person $person)
    {
        //
    }
}
