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
        <h5>{{$client->firstName}} - {{$client->lastName}}</h5>
        <a class="btn btn-info" href="{{ url('adverts/show',$client->id) }}">Show</a>
        @if(Auth::user()->is_admin)
        <form action="{{ url('adverts/destroy',$client->id) }}" method="POST">
            <a class="btn btn-primary" href="{{ url('adverts/edit',$client->id) }}">Edit</a>
            @csrf
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
        @endif
    </li>

    @empty
    <h5 class="text-center">No Adverts Found!</h5>
    @endforelse
</ul>
{!! $clients->links('pagination::bootstrap-4') !!}

@endsection