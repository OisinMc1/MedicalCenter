<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Patient;
use Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:patient');
    }

    public function index()
    {
        $user = Auth::user();

        return view('patient.home')->with([
          'user'=> $user
        ]);
    }
}
