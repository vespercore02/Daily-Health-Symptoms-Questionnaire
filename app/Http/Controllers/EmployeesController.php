<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Emp_info;
use Illuminate\Http\Request;
use App\Exports\EmployeeExport;
use Maatwebsite\Excel\Facades\Excel;

class EmployeesController extends Controller
{
    public function index(){

        return view('employee.login');

    }
    public function login(){
        
        $data = request()->validate([
            'login_id' => 'required',
            'login_pass' => 'required',
        ]);


        $adServer = "ldap://petsvr1100.petcad1100:389";

        $ldaphost = "petsvr1100.petcad1100";  // your ldap servers
        $ldapport = 389;                 // your ldap server's port number


        $ldap = ldap_connect($adServer) or die("Could not connect to $ldaphost");
        $ldaprdn = 'petcad1100' . "\\" . $data['login_id'];

        ldap_set_option($ldap, LDAP_OPT_PROTOCOL_VERSION, 3);
        ldap_set_option($ldap, LDAP_OPT_REFERRALS, 0);

        if ($ldap) {
            $bind = @ldap_bind($ldap, $ldaprdn, $data['login_pass']);

            if ($bind) {
                $user_id = str_replace('pet','',$data['login_id']);

                //dd($user_id);
                //$check = Employee::where([ ['user_id', '=', $data['user_id']],['created_at', 'LIKE', '%'.date('Y-m-d').'%'], ])->get();
                //return true;

                $user_info = Emp_info::where('id', $user_id)->get();

                //dd($user_id);
                $entrances = [
                    'HO - Aseana One 5th flr',
                    'HO - Aseana One 6th flr',
                    'HO - Aseana Two 5th flr',
                    'HO - Aseana Two Extension Bridge',
                    'BO - Ayala 3rd floor',
                    'BO - Ayala 4th floor'
                ];

                return view('questionnaire.employee', compact('user_info', 'entrances'));

            }else {
            
                return redirect()->back()->with('message', 'Wrong username or password');
            }
        }

        //return false;
    }

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
            'declare' => 'required',
        ]);

        $check = Employee::where([ ['user_id', '=', $data['user_id']],['created_at', 'LIKE', '%'.date('Y-m-d').'%'], ])->get();
        
        if (count($check) == 1) {
            # code...
            //dd($data['user']);
            return redirect()->back()->with('message', 'Already registered for today '.date('Y-m-d'));

            //return view('employee.login')->with('message', 'Already registered for today '.date('Y-m-d'));

        }else {
            # code..

            //dd($emp_info);
            $status = "";
            if ($data['body_temp'] > "37.5") {
                # code...
                $status.= "High Temperature, ";
            }
            if ($data['sore_throat'] == "Yes") {
                # code...
                $status.= "Sore Throat, ";
            }
            if ($data['cough'] == "Yes") {
                # code...
                $status.= "Cough, ";
            }
            if ($data['body_pain'] == "Yes") {
                # code...
                $status.= "Body Pain, ";
            }
            if ($data['headache'] == "Yes") {
                # code...
                $status.= "Headache, ";
            }
            if ($data['fever'] == "Yes") {
                # code...
                $status.= "Fever, ";
            }
            if ($data['nose'] == "Yes") {
                # code...
                $status.= "Runny Nose, ";
            }
            if ($data['lbm'] == "Yes") {
                # code...
                $status.= "Loose Bowel Movement, ";
            }
            if ($data['covid_contact'] == "Yes") {
                # code...
                $status.= "Contacted w/ person who has COVID-19, ";
            }
            if ($data['symptoms_contact'] == "Yes") {
                # code...
                $status.= "Contacted w/ person who has Symptoms of COVID-19, ";
            }
            if ($data['travel_outside'] == "Yes") {
                # code...
                $status.= "Traveled outside the country, ";
            }
            if ($data['travel_ncr'] == "Yes") {
                # code...
                $status.= "Traveled inside NCR, ";
            }

            if ($status != "") {
                # code...

                $emp_info = Emp_info::where('id', '=', $data['user_id'])->get();
                //dd($emp_info);
                event(new \App\Events\NewMessage('Alert '.$emp_info[0]['full_name'].' with '.$status));
            }

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
                    /*
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
                    
                    ->where(function($query){
                      $query->where('travel_ncr', 'Yes')
                            ->whereDate('created_at', '=', date('Y-m-d'));
                     
                    })
                    */
                    ->with('emp_infos')
                    ->get();

        /* Doctor and Nurse Data*/
        $body_temps = Employee::whereDate('created_at', date('Y-m-d'))
                                ->where('body_temp', '>', 37)->get();
        $sore_throats = Employee::whereDate('created_at', date('Y-m-d'))
                                ->where('sore_throat', 'Yes')->get();
        $coughs = Employee::whereDate('created_at', date('Y-m-d'))
                            ->where('cough', 'Yes')->get();
        $body_pains = Employee::whereDate('created_at', date('Y-m-d'))
                                ->where('body_pain', 'Yes')->get();
        $headaches = Employee::whereDate('created_at', date('Y-m-d'))
                                ->where('headache', 'Yes')->get();
        $fevers = Employee::whereDate('created_at', date('Y-m-d'))
                            ->where('fever', 'Yes')->get();
        $noses = Employee::whereDate('created_at', date('Y-m-d'))
                            ->where('nose', 'Yes')->get();
        $lbms = Employee::whereDate('created_at', date('Y-m-d'))
                            ->where('lbm', 'Yes')->get();
        $covid_contacts = Employee::whereDate('created_at', date('Y-m-d'))
                            ->where('covid_contact', 'Yes')->get();
        $symptoms_contacts = Employee::whereDate('created_at', date('Y-m-d'))
                            ->where('symptoms_contact', 'Yes')->get();
        $travel_outsides = Employee::whereDate('created_at', date('Y-m-d'))
                                    ->where('travel_outside', 'Yes')->get();
        $travel_ncrs = Employee::whereDate('created_at', date('Y-m-d'))
                                ->where('travel_ncr', 'Yes')->get();
        $authorizes = Employee::whereDate('created_at', date('Y-m-d'))
                                ->where('authorize', 'Yes')->get();
        $understands = Employee::whereDate('created_at', date('Y-m-d'))
                                ->where('understand', 'Yes')->get();

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

    public function report()
    {

        return view('report');
    }

    public function generate()
    {
        $data = request()->validate([
            'from_date' => 'required',
            'to_date' => 'required',
        ]);

        $employees = Employee::whereBetween('created_at', [$data['from_date'], $data['to_date']])
                                ->with('emp_infos')
                                ->get();

        //dd($employees);
        //return (new EmployeeExport($data))->download('Employee Report for '.$data['from_date'].' - '. $data['to_date'].'.xlsx');
        //return (new EmployeeExport($data))->download('Employee Report for '.$data['from_date'].' - '. $data['to_date'].'.xlsx');

        //return view('report', compact('employees'));
        
        return view('report', compact('employees'));
    }
}
