<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Emp_info;
use Illuminate\Http\Request;

class EmployeesController extends Controller
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

    public function store()
    {

        //dd(request());
        //employee::create($this->validateRequest());
          
        $data = request()->validate([
            'user_id' => 'required|exists:emp_infos,id',
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

        $check = Employee::where([ ['user_id', '=', $data['user_id']],['created_at', 'LIKE', '%'.date('Y-m-d').'%'], ])->get();
        
        if (count($check) == 1) {
            # code...
            //dd($data['user']);
            return redirect()->back()->with('message', 'Already registered for today '.date('Y-m-d'));
        }else {
            # code...
        Employee::create($data);
        return redirect()->back()->with('message', 'Successfully log');
        }

        
        
    }

    public function list()
    {

        $emp_infos = Emp_info::paginate(10);

        return view('employee.list', compact('emp_infos'));
    }

    public function view($request)
    {
        
        //dd($request);

        $emp_info   = Emp_info::where('id', '=' , $request)->get();
        $emp_status = Employee::where('user_id', '=', $request)->paginate(10);

        return view('employee.view', compact('emp_info', 'emp_status'));
        
    }

    public function search()
    {

        $search = request()->validate([
            'employee' => 'required'
        ]);

        $emp_infos = Emp_info::where('full_name', 'like', '%'.$search['employee'].'%')->paginate(10);

        //dd($emp_infos);  
        return view('employee.list', compact('emp_infos'));
    }

    public function monitor()
    {
        $employees = Employee::whereDate('created_at', date('Y-m-d'))
                    ->where('body_temp', '>', 37)
                    ->orWhere('sore_throat', '=', 'Yes')
                    ->orWhere('cough', '=', 'Yes')
                    ->orWhere('body_pain', '=', 'Yes')
                    ->orWhere('headache', '=', 'Yes')
                    ->orWhere('fever', '=', 'Yes')
                    ->orWhere('nose', '=', 'Yes')
                    ->orWhere('lbm', '=', 'Yes')
                    ->orWhere('covid_contact', '=', 'Yes')
                    ->orWhere('symptoms_contact', '=', 'Yes')
                    ->orWhere('travel_outside', '=', 'Yes')
                    ->orWhere('travel_ncr', '=', 'Yes')
                    /*
                    ->where(function($query){
                      $query->where('travel_ncr', 'Yes')
                            ->whereDate('created_at', '=', date('Y-m-d'));
                     
                    })
                    */
                    ->with('emp_infos')
                    ->get();

        /* Doctor and Nurse Data*/
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

        return view('monitor', compact(
            'employees',
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
