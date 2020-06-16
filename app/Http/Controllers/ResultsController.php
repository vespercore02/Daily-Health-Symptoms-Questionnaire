<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;

class ResultsController extends Controller
{
    public function show($request)
    {
        switch ($request) {
            case 'Body Temp':
                # code...
                $results = Employee::whereDate('created_at', date('Y-m-d'))
                                ->where('body_temp', '>', 37)->get();
                break;

            case 'Sore Throat':
                # code...
                $results = Employee::whereDate('created_at', date('Y-m-d'))
                                ->where('sore_throat', 'Yes')->get();
                break;

            case 'Cough':
                # code...
                $results = Employee::whereDate('created_at', date('Y-m-d'))
                                ->where('cough', 'Yes')->get();
                break;
            
            case 'Body Pain':
                # code...
                $results = Employee::whereDate('created_at', date('Y-m-d'))
                                ->where('body_pain', 'Yes')->get();
                break;

            case 'Headache':
                # code...
                $results = Employee::whereDate('created_at', date('Y-m-d'))
                                ->where('headache', 'Yes')->get();
                break;

            case 'Fever':
                # code...
                $results = Employee::whereDate('created_at', date('Y-m-d'))
                                ->where('fever', 'Yes')->get();
                break;

            case 'Nose':
                # code...
                $results = Employee::whereDate('created_at', date('Y-m-d'))
                                ->where('nose', 'Yes')->get();
                break;

            case 'LBM':
                # code...
                $results = Employee::whereDate('created_at', date('Y-m-d'))
                                ->where('lbm', 'Yes')->get();
                break;

            case 'Covid Contact':
                # code...
                $results = Employee::whereDate('created_at', date('Y-m-d'))
                                ->where('covid_contact', 'Yes')->get();
                break; 

            case 'Symptoms Contact':
                # code...
                $results = Employee::whereDate('created_at', date('Y-m-d'))
                                ->where('symptoms_contact', 'Yes')->get();
                break;  

            case 'Travel Outside':
                # code...
                $results = Employee::whereDate('created_at', date('Y-m-d'))
                                ->where('travel_outside', 'Yes')->get();
                break;  

            case 'Travel NCR':
                # code...
                $results = Employee::whereDate('created_at', date('Y-m-d'))
                                ->where('travel_ncr', 'Yes')->get();
                break;    
            default:
                # code...
                break;
        }

        return view('result',compact('results', 'request'));
  
    }
}
