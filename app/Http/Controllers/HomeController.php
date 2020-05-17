<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Visitor;
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
    public function index()
    {
        $visitors = Visitor::all();
        $employees = Employee::all();

        return view('home',compact('visitors','employees'));
    }
}
