@extends('layouts.app')

@section('content')
<div class="row justify-content-center mb-3">
    <div class="col-12">

        <div class="card">

            <div class="card-body">

                <h5>Questionnaire Result</h5>

                <table class="table table-bordered text-center">
                    <thead>
                    <tr>
                        <td>
                            High Temperature
                        </td>
                        <td>
                            Sore Throat
                        </td>
                        <td>
                            Cough
                        </td>
                        <td>
                            Body Pain
                        </td>
                        <td>
                            Headache
                        </td>
                        <td>
                            Fever
                        </td>
                        <td>
                            Nose
                        </td>
                        <td>
                            LBM
                        </td>
                        <td>
                            Covid Contact
                        </td>
                        <td>
                            Symptoms Contact
                        </td>
                        <td>
                            Travel Outside
                        </td>
                        <td>
                            Travel NCR
                        </td>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <a href="results/Body Temp">{{ count($body_temps) }}</a>
                            </td>
                            <td>
                                <a href="results/Sore Throat">{{ count($sore_throats) }}</a>
                            </td>
                            <td>
                                <a href="results/Cough">{{ count($coughs) }}</a>
                            </td>
                            <td>
                                <a href="results/Body Pain">{{ count($body_pains) }}</a>
                            </td>
                            <td>
                                <a href="results/Headaches">{{ count($headaches) }}</a>
                            </td>
                            <td>
                                <a href="results/Fever">{{ count($fevers) }}</a>
                            </td>
                            <td>
                                <a href="results/Noses">{{ count($noses) }}</a>
                            </td>
                            <td>
                                <a href="results/LBM">{{ count($lbms) }}</a>
                            </td>
                            <td>
                                <a href="results/Covid Contact">{{ count($covid_contacts) }}</a>
                            </td>
                            <td>
                                <a href="results/Symptoms Contact">{{ count($symptoms_contacts) }}</a>
                            </td>
                            <td>
                                <a href="results/Travel Outside">{{ count($travel_outsides) }}</a>
                            </td>
                            <td>
                                <a href="results/Travel NCR">{{ count($travel_ncrs) }}</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-12">

        <div class="card">

            <div class="card-body">
                
            <h5>Employee List</h5>

                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>
                            ID
                        </th>
                        <th>
                            Name
                        </th>
                        <th>
                            Department
                        </th>
                        <th>
                            Office
                        </th>
                        <th>
                            Entrance Used
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                        
                        @foreach ($employees as $employee)
                        <tr>
                            <td>
                                {{ $employee['id']}}
                            </td>
                        <td>
                            {{ $employee->emp_infos->full_name }}
                        </td>
                        <td>
                        {{ $employee->emp_infos->department}}
                        </td>
                        <td>
                        {{ $employee->emp_infos->branch}}
                        </td>
                        <td>
                        {{ $employee['entrance_used']}}
                        </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@include('notification')
@endsection

