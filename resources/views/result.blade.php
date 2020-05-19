@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">
        <div class="col-m-8">

            <div class="card">
                <div class="card-header">
                {{ $request }} Results
                </div>

                <div class="card-body">

                    <table class="table">
                        <thead>
                        <tr>
                            <td>
                                Name
                            </td>
                            <td>
                                Department
                            </td>
                            <td>
                                Date
                            </td>
                        </tr>
                        </thead>
                        <tbody>
                            
                            @foreach ($results as $result)
                            <tr>
                            <td>
                            {{ $result->emp_infos->full_name}}
                            </td>
                            <td>
                            {{ $result->emp_infos->department}}
                            </td>
                            <td>
                            {{ $result->created_at}}
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