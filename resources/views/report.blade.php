@extends('layouts.app')

@section('content')
    <div class="row mb-5">
        <div class="col-3">

        </div>

        <div class="col-6">
            <div class="card">

                <div class="card-body">
                    <h4>Export Report</h4>

                    <form action="/employees/generate" method="get" class="form-group">

                        <div class="form-group">
                            <label for="from_date" class="form-label">Date From</label>
                            <input type="date" name="from_date" id="from_date" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="to_date" class="form-label">Date To</label>
                            <input type="date" name="to_date" id="to_date" class="form-control">
                        </div>

                        <div class="form-group">
                            <button type="submit">Generate</button>
                        </div>

                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="col-3">

    </div>

    <div class="card">
    
        <div class="card-body">
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
                            Entrance Used
                        </th>
                        <th>
                            Body Temp.
                        </th>
                        <th>
                            Symptoms (sore throat, cough, body pain, headache, fever, nose, lbm,)
                        </th>
                        <th>
                            Contact with COVID-19
                        </th>
                        <th>
                            Contact with Symptoms
                        </th>
                        <th>
                            Traveled Outside PH
                        </th>
                        <th>
                            Traveled NCR
                        </th>
                        <th>
                            Log
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @if (!empty($employees))
                    @foreach ($employees as $user)
                    <tr>
                        <td>
                            {{ $user->user_id }}
                        </td>
                        <td>
                            {{ $user->emp_infos->full_name }}
                        </td>
                        <td>
                            {{ $user->entrance_used }}
                        </td>
                        <td>
                            {{ $user->body_temp }}
                        </td>
                        <td>
                            {{ $user->sore_throat }},
                        
                            {{ $user->cough }},
                        
                            {{ $user->body_pain }},
                        
                            {{ $user->headache }},
                        
                            {{ $user->fever }},
                        
                            {{ $user->nose }},
                        
                            {{ $user->lbm }}
                        </td>
                        <td>
                            {{ $user->covid_contact }}
                        </td>
                        <td>
                            {{ $user->symptoms_contact }}
                        </td>
                        <td>
                            {{ $user->travel_outside }}
                        </td>
                        <td>
                            {{ $user->travel_ncr }}
                        </td>
                        <td>
                            {{ $user->created_at }}
                        </td>
                    </tr>
                @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>     
@endsection
