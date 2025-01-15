@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('assets/css/edit.css') }}">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create new walkthrough</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('walkthroughs.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <label for="title" class="col-md-4 col-form-label text-md-end">Title</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autofocus>

                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ e($message) }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="content" class="col-md-4 col-form-label text-md-end">Content</label>

                            <div class="col-md-6">
                                <textarea name="content" required>{{ old('content')}}</textarea>
                                @error('content')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ e($message) }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="cover_picture" class="col-md-4 col-form-label text-md-end">Add Picture</label>

                            <div class="col-md-6">
                                <input id="cover_picture" type="file" 
                                    class="form-control @error('cover_picture') is-invalid @enderror" 
                                    name="cover_picture" 
                                    accept="image/*">
                                
                                @error('cover_picture')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ e($message) }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                        <label for="genres" class="col-md-4 col-form-label text-md-end">Genres</label>
                        <div class="col-md-6">
                            @foreach($genres as $genre)
                                    <div class="form-check">
                                        <input class="form-check-input" 
                                               type="checkbox" 
                                               name="genres[]" 
                                               value="{{ $genre->id }}" 
                                               id="genre{{ $genre->id }}"
                                               {{ in_array($genre->id, old('genres', [])) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="genre{{ $genre->id }}">
                                            {{ $genre->name }}
                                        </label>
                                    </div>
                                @endforeach
                                @error('genres')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                    </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Add Walkthrough
                                </button>
                            </div>
                        </div>

                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
