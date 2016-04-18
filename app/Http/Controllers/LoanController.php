<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Person;
use App\Loan;
use App\Movement;

class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return view("loan.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $partners = Person::where('type','Socio')->orderBy('lastName')->get();
        return view("loan.create",compact('partners'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->only(['person_id','date','limit_date','amount']);

        $rules = [
                'person_id'=>'required',
                'date'=>'required',
                'limit_date'=>'required',
                'amount'=>'required',
            ];

        $validation = \Validator::make($input,$rules);

        if($validation->passes())
        {
            $input['status'] = "Pendiente";

            $loan = new Loan($input);

            $loan->save();

            $dataMovement = ["ingress"=>0,"egress"=>$input['amount']];

            $movement = new Movement($dataMovement);

            $movement->save();

            $loan->Movements()->attach($movement->id);

            $ruta = route('prestamo-socio');

            return response()->json(["respuesta"=>"Guardado","id_persona"=>$loan->person_id]);
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
        //
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
        //
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
}
