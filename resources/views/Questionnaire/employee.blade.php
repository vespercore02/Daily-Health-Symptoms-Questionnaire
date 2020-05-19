@extends('layouts.app')

@section('content')

<div class="card">

    <div class="card-header">
        <h3>For Employee's Questionnaire</h3>
    </div>

    <div class="card-body">
        <form action="employees" method="post">

            @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
            
            <table class="table table-bordered">
                <tr>
                    <td>
                        <label for="" class="col-form-label font-weight-bold">Employee I.D. no.</label>
                    </td>
                    <td colspan="2">
                        <input type="text" name="user_id" class="form-control">
                        {{ $errors->first('user_id')}}
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