<?php

namespace App\Http\Controllers;

use App\Models\Payable;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){
        $payables = Payable::all();
        return view('home', compact('payables'));
    }


    public function createFirstSuperAdmin(Request $request){
        Auth::user()->assignRole(User::Administrator);
        return back()->with('status', 'admin priviledges granted');
    }
}
