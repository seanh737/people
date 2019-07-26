<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Resources\PersonResource;
use App\Http\Resources\PersonResourceCollection;
use App\Person;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PersonController extends Controller
{
    /**
     * @param Person $person
     * @return PersonResource
     */
    public function show(Person $user): PersonResource
    {
        return new PersonResource($user);
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
      /*  $request->validate([
            'first_name'    => 'required',
            'last_name'     => 'required',
            'email'         => 'required',
            'phone'         => 'required',
            'city'          => 'required',
        ]);*/

        $request->validate([
            'user_id'       => 'required',
            'name'          => 'required',
            'email'         => 'required',
            'password'      => 'required',
        ]);

        $user = Person::create($request->all());

        return new PersonResource($user);
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