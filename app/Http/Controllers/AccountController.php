<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Fondo;
use App\Account;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('account.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fondos = Fondo::orderBy('name')->get();
        return view('account.registerForm',compact('fondos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->only(['name','amount','type','exigible','renovate','init_date','finish_date','fondo_id']);

        $rules = [
                'name'=>'required',
                //'amount'=>'required|numeric',
                'type'=>'required',
                'exigible'=>'required',
                'renovate'=>'required|numeric',
                /*'init_date'=>'required|date',
                'finish_date'=>'required|date',*/
                'fondo_id'=>'required'
            ];

        $validation = \Validator::make($input,$rules);

        if($validation->passes())
        {
            $account = new Account($input);

            $account->save();

            $ruta = route('cuentas');

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
        $cuenta = Account::find($id);

        return view('account.edit',compact('cuenta'));
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
        $account = Account::find($id);

        $input = $request->only(['name','amount','type','renovate','init_date','finish_date','fondo_id']);

        $rules = [
                'name'=>'required',
                'amount'=>'required|numeric',
                'type'=>'required',
                'renovate'=>'required|numeric',
                'init_date'=>'required|date',
                'finish_date'=>'required|date',
                'fondo_id'=>'required'
            ];

        $validation = \Validator::make($input,$rules);

        if($validation->passes())
        {
            //$account = new Account($input);
            $account->amount = $input['amount'];
            $account->init_date = $input['init_date'];
            $account->finish_date = $input['finish_date'];

            $account->save();

            $ruta = route('cuentas');

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
    public function listOfAccounts(){
        $accounts = Account::orderBy('name')->paginate(10);

        return view('account.list',compact('accounts'));
    }
}
