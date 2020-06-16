@extends('layouts.app')

@section('content')
<div class="row mb-3">
    <div class="col-6">
        <div class="card bg-info">
            <div class="card-body p-5">
                <h4 class="text-white">No. of Employees Today - {{ date('m-d-Y')}}  </h5>
                <h5> {{ count($employees) }} </h5>
            </div>

        </div>
    </div>
    <div class="col-6">
        <div class="card bg-success mb-3">
            <div class="card-body">
                <h5 class="text-white">Head Office</h5>
                <h6> {{ count($ho_emps) }} </h5>
            </div>
        </div>

        <div class="card bg-primary">
            <div class="card-body">
                <h5 class="text-white">Branch Office</h5>
                <h6> {{ count($bo_emps) }} </h5>
            </div>
        </div>
    </div>
</div>

<div class="row justify-content-center mb-3">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                
                <h5 class="font-weight-bold">Employee List </h5>

                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
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
                        {{ $employee->emp_infos->full_name}}
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
                {{ $employees->links() }}
            </div>
        </div>
    </div>
</div>
    
    

@include('notification')

@endsection
