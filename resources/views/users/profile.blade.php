@extends('layouts.app')

@section('content')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">

<link rel="stylesheet" href="{{ asset('assets/css/profile.css') }}">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">

                @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                @endif
                <div class="profileAndNav">
                    <div class="pfpAndName">
                        <img src="{{asset('storage/'.$user->picture)}}" alt="Profile picture" class="profile-picture">
                        <div class="nameAndEmail">
                        <h2>{{$user->name}}</h2>
                        <p>{{$user->email}}</p>
                        </div>
                    </div>
                    <div class="profileNav">
                            <ul>
                                <li style="color:#9217ae"><b>User information</b></li>
                                <li>Consoles</li>
                                <li>Game collection</li>
                                <li>Walkthroughs</li>
                            </ul>
</div>
                </div>

                    <div class="profileInfo">
                        <div class="pfpCard-header">
                            <h3>Profile</h3>
                            @auth
                            @if(Auth::user()->id == $user->id)
                                <a href="{{route('users.edit', $user->id)}}" class="edit_btn"><p>Edit</p></a>
                                @auth
                                <form method="POST" action="{{ route('logout') }}" class="logout-form">
                                 @csrf
                                    <button type="submit" class="btn btn-danger">Logout</button>
                                </form>
                    @endauth
                            @endif
                            @endauth
                        </div>
                        <div class="pfpCard-body">
                            <div class="user-title">
                                <p>Username</p>
                                @if($user->date_birth)
                                <p>Date of birth</p>
                                @endif
                                <p>E-mail</p>
                            </div>
                            <div class="user-info">
                                <p>{{$user->name}}</p>
                                @if($user->date_birth)
                                <p>{{$user->date_birth}}</p>
                                @endif
                                <p>{{$user->email}}</p>
                            </div>
                            @if($user->abt_me)
                            <div class="full-width">
                                <p class="title">About me</p>
                                <p>{{$user->abt_me}}</p>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                                                     
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
