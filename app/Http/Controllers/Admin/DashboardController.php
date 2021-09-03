<?php

namespace App\Http\Controllers\Admin;

use App\Models\User ;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
    //
    
    public function index(){
        $userCount = User::count();
        $theLatestusers = User::latest()->take(5)->get(); 
        $theCurrentDate= Carbon::now(); 
        return view('admin.dashboard' , compact('userCount' , 'theLatestusers' , 'theCurrentDate'));
    }

   
}
