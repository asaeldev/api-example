<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    public function index()
    {
        // $people = [
        //     [
        //         'name' => 'Asael',
        //         'last_name' => 'Hernandez',
        //         'age' => 25
        //     ],
        //     [
        //         'name' => 'Ricardo',
        //         'last_name' => 'Montalvo',
        //         'age' => 30
        //     ]
        // ];

        $people = Person::all();

        return response()->json($people);

        //return 'Hello World from my first api!';
    }

    public function view($id)
    {
        $person = Person::find($id);
        $result = [];

        if ($person !== null) {
            $result['data'] = $person;
            $result['error'] = [];
        } else {
            $result['data'] = null;
            $result['error'] = [
                'code' => -250,
                'message' => 'The specified person does not exist'
            ];
        }

        return response()->json($result);
    }

    public function updatePut($id, Request $request)
    {
        $person = Person::find($id);
        $result = [];

        if ($person != null) {
            $person->first_name = $request->get('first_name');
            $person->last_name = $request->get('last_name');

            $saved = $person->save();
            if ($saved) {
                $result['data'] = $person;
                $result['error'] = null;
            } else {
                $result['data'] = null;
                $result['error'] = [
                    'code' => -1,
                    'message' => 'Error updating model'
                ];
            }
        }

        return response()->json($result);
    }

    public function store(Request $request)
    {
        $person = Person::create($request->all());

        // $person = new Person();

        // $person->first_name = $request->get('first_name');
        // $person->last_name = $request->get('last_name');
        // $person->email = $request->get('email');
        // $person->age = $request->get('age');

        // $person->save();

        return response()->json($person);
    }

    public function destroy($id)
    {
        Person::destroy($id);
    }
}
