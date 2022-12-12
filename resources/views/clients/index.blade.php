@extends('layouts.app')

@section('content')

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<ul class="list-group">
    @forelse($clients as $client)
    <li class="list-group-item">
        <h5>{{$client->id}} - {{$client->firstName}} - {{$client->lastName}}</h5>
        <form action="{{ url('clients/destroy/'.$client->id) }}" method="POST">
            <a class="btn btn-info" href="{{ url('clients/show',$client->id) }}">Show</a>
            <a class="btn btn-primary" href="{{ url('clients/edit',$client->id) }}">Edit</a>
            @csrf
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </li>

    @empty
    <h5 class="text-center">No Clients Found!</h5>
    @endforelse
</ul>
{!! $clients->links('pagination::bootstrap-4') !!}

@endsection