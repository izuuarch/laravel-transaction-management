<?php

namespace App\Http\Controllers\Admincontroller;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class admindashboardcontroller extends Controller
{
    public function index(){
        return view('admin.dashboard.home');
    }
    public function users(){
        $fetchusers = User::all();
        return view('admin.dashboard.users',['fetchusers'=>$fetchusers]);
    }
    public function alltransactions(){
        $usertransactions =  DB::table('transactions')
         ->paginate(2);
        //  print_r($usertransactions);
        return view('admin.dashboard.transactions',['usertransactions'=>$usertransactions]);
    }
    public function checkuser(){
        $admindata = array();
        if(Session::has('admin')){
           $admindata =  User::where('userid', Session::get('admin'))->first();
           return view('admin.partials.layout', ['admindata'=>$admindata]);
        }
    }

}
