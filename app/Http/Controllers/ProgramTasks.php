<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Movil;
use App\Person;
use App\Account;
use App\Pending;

class ProgramTasks extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addDailyAccounts()
    {
        //movil->persona->cuentasdirarias
        $movils = Movil::all();

        $today = date('Y-m-d');

        foreach ($movils as $movil) {
          $assignedAcounts = $movil->accounts;

          foreach ($assignedAcounts as $account) {
            $data = [
              'date'        => $today,
              'amount'      => $account->amount,
              'status'      => 'Pendiente',
              'movil_id'    => $movil->id,
              'account_id'  => $account->id
            ];
            //var_dump($data);
            $pending = new Pending($data);

            $pending->save();

          }
          //cuentas obligatorias
          $exigibleAccounts = Account::where('exigible',1)->where('type','Ingreso(auto)')->where('renovate',1)->get();

          foreach ($exigibleAccounts as $account) {
            $data = [
              'date'        => $today,
              'amount'      => $account->amount,
              'status'      => 'Pendiente',
              'movil_id'    => $movil->id,
              'account_id'  => $account->id
            ];
            //var_dump($data);
            $pending = new Pending($data);

            $pending->save();

          }
        }
    }

}
