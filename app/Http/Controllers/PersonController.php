<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Person;
use App\Account;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('persons.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('persons.register_form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->only(['rut','firstName','lastName','address','city','type']);

        $rules = [
                'rut'=>'required|unique:persons,rut',
                'firstName'=>'required',
                'lastName'=>'required',
                'address'=>'required',
                'city'=>'required',
                'type'=>'required'
            ];

        $validation = \Validator::make($input,$rules);

        if($validation->passes())
        {
            $person = new Person($input);

            $person->save();

            $ruta = route('personas');

            return response()->json(["respuesta"=>"Guardado","ruta"=>$ruta]);
        }

        $messages = $validation->errors();

        return response()->json($messages);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $persona = Person::find($id);

        return view('persons.edit',compact('persona'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $person = Person::find($id);

        $input = $request->only(['rut','firstName','lastName','address','city','type']);

        $rules = [
                'rut'=>'required',
                'firstName'=>'required',
                'lastName'=>'required',
                'address'=>'required',
                'city'=>'required',
                'type'=>'required'
            ];

        $validation = \Validator::make($input,$rules);

        if($validation->passes())
        {
            //$person = new Person($input);
            $person->firstName = $input['firstName'];
            $person->lastName = $input['lastName'];
            $person->address = $input['address'];
            $person->city = $input['city'];

            $person->save();

            $ruta = route('personas');

            return response()->json(["respuesta"=>"Actualizado","ruta"=>$ruta]);
        }

        $messages = $validation->errors();

        return response()->json($messages);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function listOfPersons(){
        $persons = Person::orderBy('lastName')->paginate(10);

        return view('persons.list',compact('persons'));
    }

    public function addAccounts($id){
        $person = Person::find($id);

        $accounts = Account::where('type','=','No Exigible')->orderBy('name')->get();

        return view('persons.addAccount',compact('person','accounts'));
    }

    public function saveAccount(Request $request,$id){
        //dd($id);
        $input = $request->only(['account_id']);

        $data = Person::find($id)->accounts()->where('account_id','=',$input['account_id'])->count();

        if($data == 0){            
            $account = Person::find($id)->accounts()->attach($request['account_id']);

            return response()->json(["respuesta"=>"Guardado"]);
        }else{
            //ya esta agregado
            return response()->json(["respuesta"=>"Error","mensaje"=>"Cuenta ya asignada a esta persona"]);
        }
    }

    public function testData($id,$id2){
        $data = Person::find($id)->accounts()->where('account_id','=',$id2)->count();

        dd($data);
    }

    public function deleteAccount(Request $request, $id){
        $input = $request->only(['delete_id']);
        $account = Person::find($id)->accounts()->detach($request['delete_id']);
        return response()->json(["respuesta"=>"Borrada"]);
    }

    public function listOfAccounts($id){
        $data = Person::find($id)->accounts;

        $suma = Person::find($id)->accounts()->sum('amount');

        return response()->json(["arreglo"=>$data,"suma"=>$suma]);
    }
}
