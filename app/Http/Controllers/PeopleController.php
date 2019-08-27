<?php

namespace App\Http\Controllers;

use App\People;
use App\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PeopleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $peoples = People::orderBy('id', 'desc')->get();
        foreach($peoples as $people){
            $people->created_at_pt =  \Carbon\Carbon::parse($people->created_at)->format('d/m/Y H:m:i');
        }
        return view('peoples.index', compact('peoples', 'cities', 'states'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $state = State::where('id_estado', $data['state'])->first();
        $data['location'] = $data['city'].' / '.$state->sgl_estado;
        $validation = $this->validation($data);
        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation)->withInput();
        }
        $people = People::create($data);
        return redirect()->route('peoples.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\People  $people
     * @return \Illuminate\Http\Response
     */
    public function show(People $people)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\People  $people
     * @return \Illuminate\Http\Response
     */
    public function edit(People $people)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\People  $people
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, People $people)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\People  $people
     * @return \Illuminate\Http\Response
     */
    public function destroy(People $people)
    {
        $people->delete();
        return redirect()->back()->with('message', 'Item excluídos com sucesso!');
    }

    private function validation(array $data)
    {
        $customMessages = [
            'fullname.required' => 'Informe seu nome completo',
            'location.required' => 'Informe seu estado e cidade',
            'email.unique' => 'Esse e-mail já esta cadastrado',
            'phone.unique'  => 'Esse telefone já esta cadastrado',
        ];
        $validation = [
            'fullname' => 'required|string|max:250',
            'email' => 'required|email|max:250|unique:peoples',
            'phone' => 'required|string|unique:peoples',
            'location' => 'required|string|max:250'
        ];
    	return Validator::make($data, $validation, $customMessages);
    }
}
