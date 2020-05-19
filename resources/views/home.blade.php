@extends('layouts.app')

@section('content')
<div class="container">
    
    
    @if(Auth::user()->role == 'Admin')
        @include('admin');
    @elseif(Auth::user()->role == 'Doctor')
        @include('doctor')
    @elseif(Auth::user()->role == 'Nurse')
        @include('nurse')
    @elseif(Auth::user()->role == 'Member')
        @include('member')
    @endif
</div>
@endsection
