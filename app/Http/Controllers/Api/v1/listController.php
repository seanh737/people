<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Resources\listResource;

use App\Http\Resources\PersonResource;
use App\Http\Resources\PersonResourceCollection;
use App\lists;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class listController extends Controller
{
    public function show(lists $list): PersonResource
    {
        return new PersonResource($list);
    }

    /**
     * @return PersonResourceCollection
     */
    public function index():PersonResourceCollection
    {
        return new PersonResourceCollection(lists::paginate());
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
            'message'       => 'required',
            'time'          => 'required',
            'user_id'       => 'required',
            'done'         => 'required',

        ]);

        $list = lists::create($request->all());

        return new PersonResource($list);
    }

    /**
     * @param Person $person
     * @param Request $request
     * @return PersonResource
     */
    public function update(lists $list, Request $request):PersonResource
    {
        //更新
        $list->update($request->all());

        return new PersonResource($list);
    }

    /**
     * @param Person $person
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(lists $list)
    {
        $list->delete();

        return response()->json();
    }
}
