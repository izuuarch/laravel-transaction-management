<?php

namespace App\Http\Controllers\Usercontroller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class userdashboardcontroller extends Controller
{
    public function index(){
        return view('user.dashboard.home');
    }
}
