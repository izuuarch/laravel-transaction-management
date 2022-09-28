<?php

namespace App\Http\Controllers\Usercontroller;

use App\Models\transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class transactioncontroller extends Controller
{
    public function index(){
        $usertransactions =  DB::table('transactions')
         ->join('users','users.userid','=','transactions.userid')
         ->where(['transactions.userid' => Session::get('user')])
         ->paginate(2);
        //  print_r($usertransactions);
        return view('user.dashboard.transactions',['usertransactions'=>$usertransactions]);
    }
    // public function showtransactions(){
    //     $usertransactions =  DB::table('transactions')
    //      ->join('users','users.userid','=','transactions.userid')
    //      ->where(['userid' => Session::get('user')])
    //      ->get();
    //      var_dump($usertransactions);
    // }
}
