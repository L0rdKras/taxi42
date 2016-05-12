<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Person;
use App\RouteSheet;
use App\Pay;
use App\Movement;
use App\Movil;

class PayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $partners = Person::where('type','Socio')->orderBy('lastName')->get();

        $routeSheet = RouteSheet::orderBy('created_at','desc')->first();

        return view('pay_accounts.pay',compact('partners','routeSheet'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->only(['pay_date','movil_id','sheetsquantity','totalDebtAccount']);
        $routeSheet = RouteSheet::orderBy('created_at','desc')->first();

        $valueRouteSheet = $routeSheet->amount;

        $totalSheet = $valueRouteSheet*$data['sheetsquantity'];

        $totalPendings = Movil::find($data['movil_id'])->Pendings()->where('date',$data['pay_date'])->where('status','Pendiente')->sum('amount');
        //return $totalPendings;

        $totalPay = $totalPendings+$totalSheet;

        $pendings = Movil::find($data['movil_id'])->Pendings()->where('date',$data['pay_date'])->where('status','Pendiente')->get();

        foreach ($pendings as $pending) {
          $pending->status = 'Cancelada';
          $pending->save();
        }

        $dataSave = [
          'date'=>$data['pay_date'],
          'total'=>$totalPay,
          'sheets'=>$data['sheetsquantity'],
          'sheets_value'=>$valueRouteSheet,
          'movil_id'=>$data['movil_id']
        ];

        $pay = new Pay($dataSave);

        $pay->save();

        $dataMovement = ["ingress"=>$totalPay,"egress"=>0];

        $movement = new Movement($dataMovement);

        $movement->save();

        $pay->Movements()->attach($movement->id);

        return "Guardado";
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
