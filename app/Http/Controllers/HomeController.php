<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Visitor;
use App\User;
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

        //dd($request);
        $visitors = Visitor::all();
        $employees = Employee::with('emp_infos')->whereDate('created_at',date('Y-m-d'))->paginate(10);
        $ho_emps   = Employee::with('emp_infos')
                                ->whereDate('created_at', date('Y-m-d'))
                                ->where('entrance_used', 'LIKE', '%HO%')->get();
        $bo_emps   = Employee::with('emp_infos')
                                ->whereDate('created_at', date('Y-m-d'))
                                ->where('entrance_used', 'LIKE', '%BO%')->get();
        $users     = User::all();

        /* Paginate Employee list */
        //$employees = Employee::with('emp_infos')->where('created_at', 'LIKE', '%'.date('Y-m-d').'%')->paginate(10);
        //dd($employees);

        

        //dd($employees);

        return view('home',compact(
            'visitors',
            'employees',
            'users',
            'ho_emps',
            'bo_emps'
        ));
    }
}
