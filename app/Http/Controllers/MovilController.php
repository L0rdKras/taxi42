<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;

use App\Movil;
use App\Person;
use App\Pending;
use App\Account;

class MovilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('movils.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $partners = Person::where('type','=','Socio')->orderBy('lastName')->get();
        return view('movils.register_form',compact('partners'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->only(['number','plate','mark','model','person_id']);

        $rules = [
                'number'=>'required|unique:movils,number',
                'plate'=>'required|unique:movils,plate',
                'mark'=>'required',
                'model'=>'required',
                'person_id'=>'required'
            ];

        $validation = \Validator::make($input,$rules);

        if($validation->passes())
        {
            $movil = new Movil($input);

            $movil->save();

            $ruta = route('moviles');

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
      $movil = Movil::find($id);
      $partners = Person::where('type','=','Socio')->orderBy('lastName')->get();

      return view('movils.edit',compact('movil','partners'));
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
      $input = $request->only(['number','plate','mark','model','person_id']);

      $rules = [
              'number'=>'required',
              'plate'=>'required',
              'mark'=>'required',
              'model'=>'required',
              'person_id'=>'required'
          ];

      $validation = \Validator::make($input,$rules);

      if($validation->passes())
      {
          $movil = Movil::find($id);

          //$movil->number    = $input['number'];
          //$movil->plate     = $input['plate'];
          $movil->mark      = $input['mark'];
          $movil->model     = $input['model'];
          $movil->person_id = $input['person_id'];

          $movil->save();

          $ruta = route('moviles');

          return response()->json(["respuesta"=>"Guardado","ruta"=>$ruta]);
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

    public function listOfMovils(){
        $movils = Movil::orderBy('plate')->paginate(10);

        return view('movils.list',compact('movils'));
    }

    public function debtsMovil($id){
        $fechas = DB::table('pendings')
        //->select('date')
        ->select(DB::raw("sum(amount) as total,date"))
        ->distinct()
        ->where('movil_id',$id)
        ->where('status','Pendiente')
        ->groupBy('date')
        ->get();

        return response()->json($fechas);
    }

    public function debtsDayMovil($id,$date){
      $pendings = Movil::find($id)->Pendings()->where('date',$date)->where('status','Pendiente')->get();

      $array = [];

      foreach ($pendings as $pending) {
        $array[] = [
          'name'    =>$pending->Account->name,
          'amount'  =>$pending->amount
        ];
      }

      //dd($pendings);
      return response()->json($array);
    }

    public function addAccounts($id){
        $movil = Movil::find($id);

        $accounts = Account::where('type','=','Ingreso')->orderBy('name')->get();

        return view('movils.addAccount',compact('movil','accounts'));
    }

    public function saveAccount(Request $request,$id){
        //dd($id);
        $input = $request->only(['account_id']);

        $data = Movil::find($id)->accounts()->where('account_id','=',$input['account_id'])->count();

        if($data == 0){
            $account = Movil::find($id)->accounts()->attach($request['account_id']);

            return response()->json(["respuesta"=>"Guardado"]);
        }else{
            //ya esta agregado
            return response()->json(["respuesta"=>"Error","mensaje"=>"Cuenta ya asignada a este movil"]);
        }
    }

    public function deleteAccount(Request $request, $id){
        $input = $request->only(['delete_id']);
        $account = Movil::find($id)->accounts()->detach($request['delete_id']);
        return response()->json(["respuesta"=>"Borrada"]);
    }
}
