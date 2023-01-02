@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2> Show Advert</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('clients.index') }}"> Back</a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            {{ $client->name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Price:</strong>
            {{ $client->price }}€
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Description:</strong>
            {{ $client->description }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Seller:</strong>
            {{ $client->user->email }}
        </div>
    </div>
    <div class="comment-area mt-4">
    @forelse($comments as $comment)
        <div class="card card-body">
            <h6 class="card-title">Leave a comment</h6>
            <form action="{{ url('comments') }}" method="POST">
                @csrf
                <input type="hidden" name="comment_id" value="{{ $comment->id }}">
                <textarea name="comment_body" class="form-control" rows="3" required></textarea>
                <button type="submit" class="btn btn-primary mt-3">Submit</button>
            </form>
        </div>
        <div class="card card-body shadow-sm mt-3">
            <div class="detail-area">
                <h6 class="user-name mb-1">
                    @if($comment->user)
                    {{ $comment->user->name }}
                    @endif
                    <small class="ms-3 text-primary">Commented on: {{ $comment->created_at->format('d-m-Y') }}</small>
                </h6>
                <p class="user-comment mb-1">
                    {!! $comment->comment_body !!}
                </p>
            </div>
            <div>
                <a href="" class="btn btn-primary btn-sm me-2">Edit</a>
                <a href="" class="btn btn-danger btn-sm me-2">Delete</a>
            </div>
        </div>
        @empty
        <h6>No Comments</h6>
        @endforelse
    </div>
</div>
@endsection