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
                        <h3><a href="{{route('walkthroughs.show', $walkthrough->id)}}">{{ $walkthrough ->title }}</a></h3>
                        <p>{{ $walkthrough ->content }}</p>
                        <small>Posted by <a href="{{route('profile', $walkthrough->user->name)}}">{{ $walkthrough ->user->name}}</a> at {{ $walkthrough ->created_at->format('d/m/Y') }}</small>

                        @auth
                        @if($walkthrough->user_id == Auth::user()->id)
                            <a href="{{route('walkthroughs.edit', $walkthrough->id)}}">Edit walkthrough</a>
                        @else
                            <a href="{{route('like', $walkthrough->id)}}">Like walkthrough</a>
                        @endif
                        <br>
                        walkthrough has {{$walkthrough->likes()->count()}} likes
                        <hr>
                        @endauth
                    @endforeach
                </div>

                <div class="card-header">Recent news</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @foreach($posts as $post)
                        <h3><a href="{{route('posts.show', $post->id)}}">{{ $post ->title }}</a></h3>
                        <p>{{ $post ->content }}</p>
                        <small>Posted by <a href="{{route('profile', $post->user->name)}}">{{ $post->user->name}}</a> at {{ $post ->created_at->format('d/m/Y') }}</small>

                        @auth
                        @if($post->user_id == Auth::user()->id)
                            <a href="{{route('posts.edit', $post->id)}}">Edit post</a>
                        @else
                            <a href="{{route('like', $post->id)}}">Like post</a>
                        @endif
                        
                        @endauth
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
