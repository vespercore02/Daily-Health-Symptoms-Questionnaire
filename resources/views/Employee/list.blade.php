@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">


            <div class="card">
                <div class="card-header">
                    <h4>Employee List</h4>
                </div>
                <div class="card-body">

                    <form action="list" method="post" class="mb-5" autocomplete="off">
                        <div class="form-group">
                            <label for="" class="form-label">Search :</label>
                            <input type="text" name="employee" id="" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        @csrf
                    </form>

                    <table class="table table-bordered text-center">
                        <thead>
                            <tr>
                                <th>
                                    I.D No.
                                </th>
                                <th>
                                    Name
                                </th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($emp_infos as $emp_info)
                                <tr>
                                    <td>
                                        <a href="view/{{ $emp_info->id }}">{{ $emp_info->id }}</a>
                                    </td>
                                    <td>
                                        {{ $emp_info->full_name}}
                                    </td>
                                </tr>
                                
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
            </div>
            
            {{ $emp_infos->links() }}
        </div>
    </div>

@endsection