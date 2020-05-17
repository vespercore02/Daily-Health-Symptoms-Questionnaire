<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuestionnaireController extends Controller
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

        return view('questionnaire.questions', compact('entrances'));
    }

    public function store(Request $request)
    {

        //dd($request()->);
        //Answer::create($this->validateRequest());
        
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
            
        
        $answer = new Answer();
        $answer->user_id = $request->input('user_id');
        $answer->entrance_used = $request->input('entrance_used');
        $answer->body_temp = $request->input('body_temp');
        $answer->sore_throat = $request->input('sore_throat');
        $answer->cough = $request->input('cough');
        $answer->body_pain = $request->input('body_pain');
        $answer->headache = $request->input('headache');
        $answer->fever = $request->input('fever');
        $answer->runny_nose = $request->input('runny_nose');
        $answer->lbm = $request->input('lbm');
        $answer->covid_contact = $request->input('covid_contact');
        $answer->symptoms_contact = $request->input('symptoms_contact');
        $answer->travel_outside = $request->input('travel_outside');
        $answer->travel_ncr = $request->input('travel_ncr');
        $answer->authorize = $request->input('authorize');
        $answer->understand = $request->input('understand');
        $answer->save();
        
            return back();
        
    }

    private function validateRequest()
    {
        /*
        return request()->validate([
            'user_id' => 'required',
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
        ]);
        */

        dd(request());
    }
}
