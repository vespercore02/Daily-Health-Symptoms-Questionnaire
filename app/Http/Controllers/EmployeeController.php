<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function show()
    {

        $entrances = [
            'HO - Aseana One 5th flr',
            'HO - Aseana One 6th flr',
            'HO - Aseana Two 5th flr',
            'HO - Aseana Two Extension Bridge',
            'BO - Ayala 3rd floor',
            'BO - Ayala 4th floor'
        ];

        return view('questionnaire.employee', compact('entrances'));
    }

    public function store(Employee $request)
    {

        //dd($request->input());
        //employee::create($this->validateRequest());
        
        $this->validate(request(), [
            'user_id' => 'required|exists:users,id',
            'entrance_used' => 'required',
            'body_temp' => 'required',
            'sore_throat' => 'required',
            'cough' => 'required',
            'body_pain' => 'required',
            'headache' => 'required',
            'fever' => 'required',
            'runny_nose' => 'required',
            'lbm' => 'required',
            'covid_contact' => 'required',
            'symptoms_contact' => 'required',
            'travel_outside' => 'required',
            'travel_ncr' => 'required',
            'authorize' => 'required',
            'understand' => 'required',
        ]);
            
        
        $employee = new Employee();
        $employee->user_id = $request->input('user_id');
        $employee->entrance_used = $request->input('entrance_used');
        $employee->body_temp = $request->input('body_temp');
        $employee->sore_throat = $request->input('sore_throat');
        $employee->cough = $request->input('cough');
        $employee->body_pain = $request->input('body_pain');
        $employee->headache = $request->input('headache');
        $employee->fever = $request->input('fever');
        $employee->runny_nose = $request->input('runny_nose');
        $employee->lbm = $request->input('lbm');
        $employee->covid_contact = $request->input('covid_contact');
        $employee->symptoms_contact = $request->input('symptoms_contact');
        $employee->travel_outside = $request->input('travel_outside');
        $employee->travel_ncr = $request->input('travel_ncr');
        $employee->authorize = $request->input('authorize');
        $employee->understand = $request->input('understand');
        $employee->save();

        dd($employee->save());
        
            return back();
        
    }
}
