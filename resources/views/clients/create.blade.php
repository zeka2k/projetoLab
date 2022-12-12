@extends('layouts.app')
@section('content')
<form action="{{url('/clients')}}" method="post">
    @csrf {{-- <- Required for protection or the form is rejected --}} First Name: <input type="text" name="firstName"
        value="{{old('firstName')}}">
        Last Name: <input type="text" name="lastName" value="{{old('lastName')}}">
        <button type="submit" class="btn btn-primary">Create</button>
</form>

@if ($errors->any())
<div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@endsection