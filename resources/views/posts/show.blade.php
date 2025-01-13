@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('assets/css/news.css') }}">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="body">
                <div class="title">{{$post->title}}</div>

                <div class="content">

                <div class="postedBy">
                    <div class="profile">
                        <div class="image-container">
                            <img src="{{ asset('storage/'.$post->user->picture) }}" alt="" class="cover_picture">
                        </div>
                        <p>BY <a href="{{route('profile', $post->user->name)}}">{{$post->user->name}}</a></p>
                    </div>
                    @auth
                    @if(Auth::user()->id == $post->user->id)
                    <div class="actions">
                    <a href="{{route('posts.edit', $post)}}" class="edit_btn"><p>Edit</p></a>

                        <form method="POST" action="{{route('posts.destroy', $post->id)}}">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Delete post" class="delete_btn">
                        </form>
                    </div>
                    @endif
                    @endauth
                </div>
                <p class="post-date">{{ $post ->created_at->format('d/m/Y') }}</p>


                <div class="cover_picture">
                    <img src="{{ asset('storage/'.$post->cover_picture) }}" alt="{{$post->title}}">
                </div>
                    
                <div class="content">
                    {!! preg_replace('/\*\*(.*?)\*\*/', '<span class="highlighted-text">$1</span>', $post->content) !!}
                </div>

                    @auth
                        @if($post->user_id == Auth::user()->id)
                        @else
                            <a href="{{ route('like.post', $post->id) }}">Like post</a>
                        @endif
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
