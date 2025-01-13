@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('assets/css/edit.css') }}">

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Contact Us</div>

                <div class="card-body">
                    @if(session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('contacts.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea class="form-control @error('message') is-invalid @enderror" name="message" required>{{ old('message') }}</textarea>
                            @error('message')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Send Message</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
