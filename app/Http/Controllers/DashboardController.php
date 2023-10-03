<?php
//package
namespace App\Http\Controllers;
//import class

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function home()
    {
        return view('dashboard.home');
    }
}
