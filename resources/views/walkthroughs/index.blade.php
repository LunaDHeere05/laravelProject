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
                        <small>Posted by {{ $walkthrough ->user->name}} at {{ $walkthrough ->created_at }}</small>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
