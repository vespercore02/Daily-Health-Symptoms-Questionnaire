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
                $results = Employee::where('body_temp', '>', 37)->get();
                break;

            case 'Sore Throat':
                # code...
                $results = Employee::where('sore_throat', 'Yes')->get();
                break;

            case 'Cough':
                # code...
                $results = Employee::where('cough', 'Yes')->get();
                break;
            
            case 'Body Pain':
                # code...
                $results = Employee::where('body_pain', 'Yes')->get();
                break;

            case 'Headache':
                # code...
                $results = Employee::where('headache', 'Yes')->get();
                break;

            case 'Fever':
                # code...
                $results = Employee::where('fever', 'Yes')->get();
                break;

            case 'Nose':
                # code...
                $results = Employee::where('nose', 'Yes')->get();
                break;

            case 'LBM':
                # code...
                $results = Employee::where('lbm', 'Yes')->get();
                break;

            case 'Covid Contact':
                # code...
                $results = Employee::where('covid_contact', 'Yes')->get();
                break; 

            case 'Symptoms Contact':
                # code...
                $results = Employee::where('symptoms_contact', 'Yes')->get();
                break;  

            case 'Travel Outside':
                # code...
                $results = Employee::where('travel_outside', 'Yes')->get();
                break;  

            case 'Travel NCR':
                # code...
                $results = Employee::where('travel_ncr', 'Yes')->get();
                break;    
            default:
                # code...
                break;
        }

        return view('result',compact('results', 'request'));
  
    }
}
