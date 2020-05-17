@extends('layouts.app')

@section('content')

<div class="card">

    <div class="card-header">
        <h3>For Visitor's Questionnaire</h3>
    </div>

    <div class="card-body">

        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
        <form action="visitors" method="POST">
            
            <table class="table table-bordered">
                <tr>
                    <td colspan="3">
                        <div class="row">
                            <div class="col-3 text-center">
                                
                                <label for="" class="col-form-label font-weight-bold">Name :</label>

                            </div>

                            <div class="col-3">
                                
                                <input type="text" name="last_name" class="form-control" placeholder="Last Name">
                            </div>

                            <div class="col-3">
                                
                                <input type="text" name="first_name" class="form-control" placeholder="First Name">
                            </div>

                            <div class="col-3">
                                
                                <input type="text" name="middle_name" class="form-control" placeholder="Middle Name">
                            </div>

                        
                        
                        </div>
                    </td>
                </tr>

                <tr>
                    <td colspan="3">
                        <div class="row">
                            <div class="col-3 text-center">
                                <label for="" class="col-form-label font-weight-bold">Sex :</label>
                            </div>

                            <div class="col-3">
                                <select name="sex" id="" class="form-control">
                                    <option value=""></option>
                                    <option value="m">Male</option>
                                    <option value="f">Female</option>
                                </select>
                            </div>

                            <div class="col-3 text-center">
                                <label for="" class="col-form-label font-weight-bold">Age :</label>
                            </div>

                            <div class="col-3">
                                <input type="number" name="age" class="form-control" placeholder="Years old">
                            </div>
                        </div>
                    </td>
                </tr>

                <tr>

                    <td colspan="3">

                        <div class="row">
                            <div class="col-3 text-center">
                                <label for="" class="col-form-label font-weight-bold">Residence Address :</label>
                            </div>
    
                            <div class="col">
                                <input type="text" name="residence_add" class="col form-control" placeholder="">
                            </div>
                        </div>
                    </td>

                </tr>

                <tr>

                    <td colspan="3">

                        <div class="row">
                            <div class="col-3 text-center">
                                <label for="" class="col-form-label font-weight-bold">Company Name :</label>
                            </div>
    
                            <div class="col">
                                <input type="text" name="company_name" class="col form-control" placeholder="">
                            </div>
                        </div>
                    </td>

                </tr>

                <tr>

                    <td colspan="3">

                        <div class="row">
                            <div class="col-3 text-center">
                                <label for="" class="col-form-label font-weight-bold">Company Address :</label>
                            </div>
    
                            <div class="col">
                                <input type="text" name="company_add" class="col form-control" placeholder="">
                            </div>
                        </div>
                    </td>

                </tr>
                <tr>
                    <td>
                        <label for="" class="col-form-label font-weight-bold">Entrance Used</label>
                    </td>
                    <td colspan="2">
                        <select name="entrance_used" id="" class="form-control form-control-lg">
                            <option value=""></option>
                            @foreach ($entrances as $entrance)
                        <option value="{{ $entrance }}" > {{ $entrance }}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="" class="col-form-label font-weight-bold">Body Temperature in Centigrade</label>
                    </td>
                    <td colspan="2">
                        <input type="decimal" name="body_temp" class="form-control">
                    </td>
                </tr>
                
                @include('questionnaire.questions')

                <tr class="">
                    <td></td>
                    <td colspan="2" class="text-center">
                        <button type="submit" class="btn btn-primary pl-5 pr-5">Submit</button>
                    </td>
                </tr>
            </table>
            
        
            
        
            @csrf
        </form>
    </div>
</div>


@endsection