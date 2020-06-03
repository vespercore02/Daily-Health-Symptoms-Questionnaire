@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-12">

        <div class="card mb-5">
            <div class="card-header">
                <h4>Employee info</h4>
            </div>
            
            <div class="card-body">
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th>
                                I.D. No.
                            </th>
                            <th>
                                Name
                            </th>
                            <th>
                                Deparment
                            </th>
                            <th>
                                Office
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($emp_info as $emp)
                        <tr>
                            <td>
                                {{ $emp->id }}
                            </td>
                            <td>
                                {{ $emp->full_name }}
                            </td>
                            <td>
                                {{ $emp->department }}
                            </td>
                            <td>
                                {{ $emp->branch }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>            


        <div class="card">
            
            <div class="card-header">
            
                <h4>Questionnaire Result</h4>
            
            </div>

            <div class="card-body">

                <table class="table table-bordered text-center">
                    <thead>
                    <tr>
                        <th>
                            Date
                        </th>
                        <th>
                            Body Temperature
                        </th>
                        <th>
                            Sore Throat
                        </th>
                        <th>
                            Cough
                        </th>
                        <th>
                            Body Pain
                        </th>
                        <th>
                            Headache
                        </th>
                        <th>
                            Fever
                        </th>
                        <th>
                            Nose
                        </th>
                        <th>
                            LBM
                        </th>
                        <th>
                            Covid Contact
                        </th>
                        <th>
                            Symptoms Contact
                        </th>
                        <th>
                            Travel Outside
                        </th>
                        <th>
                            Travel NCR
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($emp_status as $emp_stat)
                            <tr>
                                <td>
                                    {{ $emp_stat->created_at }}
                                </td>
                                <td>
                                    {{ $emp_stat->body_temp }}</a>
                                </td>
                                <td>
                                    {{ $emp_stat->sore_throat }}
                                </td>
                                <td>
                                    {{ $emp_stat->cough }}
                                </td>
                                <td>
                                    {{ $emp_stat->body_pain }}
                                </td>
                                <td>
                                    {{ $emp_stat->headache }}
                                </td>
                                <td>
                                    {{ $emp_stat->fever }}
                                </td>
                                <td>
                                    {{ $emp_stat->nose }}
                                </td>
                                <td>
                                    {{ $emp_stat->lbm }}
                                </td>
                                <td>
                                    {{ $emp_stat->covid_contact }}
                                </td>
                                <td>
                                    {{ $emp_stat->symptoms_contact }}
                                </td>
                                <td>
                                    {{ $emp_stat->travel_outside }}
                                </td>
                                <td>
                                    {{ $emp_stat->travel_ncr }}
                                </td>
                            </tr>
                            @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        </div>
    </div>

@endsection