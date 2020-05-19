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
        $employees = Employee::with('emp_infos')->get();
        $users      = User::all();

        $body_temps = Employee::where('body_temp', '>', 37)->get();
        $sore_throats = Employee::where('sore_throat', 'Yes')->get();
        $coughs = Employee::where('cough', 'Yes')->get();
        $body_pains = Employee::where('body_pain', 'Yes')->get();
        $headaches = Employee::where('headache', 'Yes')->get();
        $fevers = Employee::where('fever', 'Yes')->get();
        $noses = Employee::where('nose', 'Yes')->get();
        $lbms = Employee::where('lbm', 'Yes')->get();
        $covid_contacts = Employee::where('covid_contact', 'Yes')->get();
        $symptoms_contacts = Employee::where('symptoms_contact', 'Yes')->get();
        $travel_outsides = Employee::where('travel_outside', 'Yes')->get();
        $travel_ncrs = Employee::where('travel_ncr', 'Yes')->get();
        $authorizes = Employee::where('authorize', 'Yes')->get();
        $understands = Employee::where('understand', 'Yes')->get();
        

        //dd($employees);

        return view('home',compact(
            'visitors',
            'employees',
            'users',
            'body_temps',
            'sore_throats',
            'coughs',
            'body_pains',
            'headaches',
            'fevers',
            'noses',
            'lbms',
            'covid_contacts',
            'symptoms_contacts',
            'travel_outsides',
            'travel_ncrs',
            'authorizes',
            'understands'
        ));
    }
}
