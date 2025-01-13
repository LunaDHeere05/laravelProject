@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="{{ asset('assets/css/index.css') }}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


<div class="body">
    <div class="recentNews">
        <h1>Recent News</h1>
        <!-- Carousel -->
        <div id="carouselExampleCaptions" class="carousel slide custom-carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        @foreach($posts as $key => $post)
                        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                            <a href="{{ route('posts.show', $post->id) }}">
                                <img src="{{ asset('storage/'.$post->cover_picture) }}" class="d-block w-100" alt="{{$post->title}}">
                            </a>
                                <div class="blur-caption">
                                    <h5>{{$post->title}}</h5>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                    </div>
        <!-- end carousel -->
    </div>
    <div class="walkthroughs">
        <div class="titleAndOptions">
            <h1>Recent Walkthroughs</h1>
            <a href="{{ route('walkthroughs.create') }}">Create Walkthrough</a>
        </div>
        <div class="walkthroughs-list">
                    @foreach($walkthroughs as $walkthrough)
                    <div class="walkthrough-item">
                        <div class="image-container">
                            <img src="{{ asset('storage/'.$walkthrough->cover_picture) }}" alt="" class="cover_picture">
                        </div>
                        <h3><a href="{{route('walkthroughs.show', $walkthrough->id)}}">{{ $walkthrough ->title }}</a></h3>
                        <small>{{ $walkthrough ->created_at->format('d/m/Y') }}</small>
                    </div>
                    @endforeach
        </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
@endsection
