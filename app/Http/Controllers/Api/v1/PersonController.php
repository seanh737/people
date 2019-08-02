<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Resources\PersonResource;
use App\Http\Resources\PersonResourceCollection;
use App\Person;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use GuzzleHttp\Client;

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
    /*public function get_detail() 失敗
    {
        $url = "https://api.postalpincode.in/pincode/110001";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        curl_close($ch);
        echo $output;
    }*/
    public function get_api()
    {
        $client = new Client();
        $response = $client->request('GET', 'https://api.postalpincode.in/pincode/110001');
        $statusCode = $response->getStatusCode();
        $body = $response->getBody()->getContents();

        return $body;
    }
}