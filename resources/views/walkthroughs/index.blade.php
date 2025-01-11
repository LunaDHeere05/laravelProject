@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Recent walkthroughs</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @foreach($walkthroughs as $walkthrough)
                        <h3>{{ $walkthrough ->title }}</h3>
                        <p>{{ $walkthrough ->content }}</p>
                        <small>Posted by {{ $walkthrough ->user->name}} at {{ $walkthrough ->created_at->format('d/m/Y') }}</small>

                        @auth
                        @if($walkthrough->user_id == Auth::user()->id)
                            <a href="{{route('walkthroughs.edit', $walkthrough->id)}}">Edit walkthrough</a>
                        @else
                            <a href="{{route('like', $walkthrough->id)}}">Like post</a>
                        @endif
                        <br>
                        walkthrough has {{$walkthrough->likes()->count()}} likes
                        <hr>
                        @endauth
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
