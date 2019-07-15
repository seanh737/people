<?php

namespace App\Http\Controllers;

use App\Http\Resources\PersonResource;
use App\Http\Resources\PersonResourceCollection;
use App\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    /**
     * @param Person $person
     * @return PersonResource
     */
    public function show(Person $person): PersonResource
    {
        return new PersonResource($person);
    }

    /**
     * @return PersonResourceCollection
     */
    public function index():PersonResourceCollection
    {
        return new PersonResourceCollection(Person::paginate());
    }

    /**
     * @param Request $request
     * @return PersonResource
     */
    public function store(Request $request)
    {
        //建立
        $request->validate([
            'first_name'    => 'required',
            'last_name'     => 'required',
            'email'         => 'required',
            'phone'         => 'required',
            'city'          => 'required',
        ]);

        $person = Person::create($request->all());

        return new PersonResource($person);
    }

    /**
     * @param Person $person
     * @param Request $request
     * @return PersonResource
     */
    public function update(Person $person, Request $request):PersonResource
    {
        //更新
        $person->update($request->all());

        return new PersonResource($person);
    }

    /**
     * @param Person $person
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Person $person)
    {
        $person->delete();

        return response()->json();
    }
}
