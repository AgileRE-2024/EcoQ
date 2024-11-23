<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //

    public function index()
    {
        if (Auth::user()->role == 'admin') {
            return view('dashboard.admin.index');
        } else if (Auth::user()->role == 'garden_owner') {
            return view('dashboard.garden_owner.index');
        }
        return redirect()->route('welcome')->with('error', 'You are not authorized to access this page');
    }
}
