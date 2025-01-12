@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$post->title}}</div>

                <div class="card-body">
                    

                        
                        <small>Posted by <a href="{{route('profile', $post->user->name)}}">{{ $post ->user->name}}</a> at {{ $post ->created_at->format('d/m/Y') }}</small>
                        <br>
                        {{$post->content}}
                        @auth
                        @if($post->user_id == Auth::user()->id)
                            <a href="{{route('posts.edit', $post->id)}}">Edit post</a>
                        @else
                            <a href="{{route('like', $post->id)}}">Like post</a>
                        @endif
                        @endauth

                        @auth
                        @if(Auth::user()->is_admin)
                            <br><br>
                            <form method="POST" action="{{route('posts.destroy', $post->id)}}">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="Delete post">
                        @endif
                        @endauth
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
