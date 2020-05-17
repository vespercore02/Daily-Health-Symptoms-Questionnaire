<?php

namespace App\Http\Controllers;

use App\Visitor;
use Illuminate\Http\Request;

class VisitorsController extends Controller
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

        return view('questionnaire.visitor', compact('entrances'));
    }

    public function store()
    {

        $data = request()->validate([
            'last_name' => 'required',
            'first_name' => 'required',
            'middle_name' => 'required',
            'sex' => 'required',
            'age' => 'required',
            'company_name' => 'required',
            'company_add' => 'required',
            'residence_add' => 'required',
            'entrance_used' => 'required',
            'body_temp' => 'required',
            'sore_throat' => 'required',
            'cough' => 'required',
            'body_pain' => 'required',
            'headache' => 'required',
            'fever' => 'required',
            'nose' => 'required',
            'lbm' => 'required',
            'covid_contact' => 'required',
            'symptoms_contact' => 'required',
            'travel_outside' => 'required',
            'travel_ncr' => 'required',
            'authorize' => 'required',
            'understand' => 'required',
        ]);
        
        Visitor::create($data);
        
        return redirect()->back()->with('message', 'Sucessfully Submit!');
        
    }
}
