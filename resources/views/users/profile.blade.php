@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Profile of {{$user->name}}</div>

                <div class="card-body">

                @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                @endif
                    <h2>Username: {{$user->name}}</h2>
                    <h2>About me: {{$user->abt_me}}</h2>
                    <h2>Date of birth: {{$user->date_birth}}</h2>
                    <h2>Walkthroughs</h2>

                    @foreach($user->walkthroughs as $walkthrough)
                        <a href="{{route('walkthroughs.show', $walkthrough->id)}}">{{$walkthrough->title}}</a><br>
                    @endforeach

                    @auth
                        <a href="{{route('users.edit', $user->id)}}">Edit profile</a>
                    @endauth
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
