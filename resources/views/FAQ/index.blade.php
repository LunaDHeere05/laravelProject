@extends('layouts.app')
@section('content')
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<div class="container">
    <h2 class="text-center">Frequently Asked Questions</h2>

    @auth
    @if(Auth::user()->is_admin)
    <a href="{{route('FAQ.create')}}">create new faq</a>
    @endif
    @endauth

    @foreach($FAQsByCategory as $category => $FAQs)
        <h3 class="mt-4">{{ e($category) ?? 'Uncategorized' }}</h3>
        <div class="accordion" id="accordionExample{{ $loop->index }}">
            @foreach($FAQs as $index => $FAQ)
                <div class="accordion-item">
                    <h2 class="accordion-header" id="heading{{ $loop->parent->index }}-{{ $index }}">
                        <button class="accordion-button {{ $index == 0 ? '' : 'collapsed' }}" 
                                type="button" 
                                data-bs-toggle="collapse" 
                                data-bs-target="#collapse{{ $loop->parent->index }}-{{ $index }}" 
                                aria-expanded="{{ $index == 0 ? 'true' : 'false' }}" 
                                aria-controls="collapse{{ $loop->parent->index }}-{{ $index }}">
                            {{ e($FAQ->question) }}
                        </button>
                    </h2>
                    <div id="collapse{{ $loop->parent->index }}-{{ $index }}" 
                         class="accordion-collapse collapse {{ $index == 0 ? 'show' : '' }}" 
                         aria-labelledby="heading{{ $loop->parent->index }}-{{ $index }}" 
                         data-bs-parent="#accordionExample{{ $loop->parent->index }}">
                        <div class="accordion-body">
                            <strong>{{ e($FAQ->answer) }}</strong>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endforeach


</div>


@endsection
