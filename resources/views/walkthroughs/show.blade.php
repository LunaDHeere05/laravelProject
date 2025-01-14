@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('assets/css/walkthroughs.css') }}">


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{e($walkthrough->title)}}</div>

                <div class="card-body">
                    <small>Posted by 
                        <a href="{{route('profile', $walkthrough->user->name)}}">
                            {{ e($walkthrough->user->name) }}
                        </a> 
                        at {{ e($walkthrough->created_at->format('d/m/Y')) }}
                    </small>
                    <br>
                    {{$walkthrough->content}}
                    @auth
                        @if($walkthrough->user_id == Auth::user()->id)
                            <a href="{{route('walkthroughs.edit', $walkthrough->id)}}">Edit walkthrough</a>
                        @else
                            <a href="{{route('like', $walkthrough->id)}}">Like post</a>
                        @endif
                        <br>
                        walkthrough has {{e($walkthrough->likes()->count())}} likes
                        <hr>
                    @endauth

                    @auth
                        @if(Auth::user()->is_admin)
                            <br><br>
                            <form method="POST" action="{{route('walkthroughs.destroy', $walkthrough->id)}}">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="Delete walkthrough">
                            </form>
                        @endif
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
