<!doctype html>
<link rel="stylesheet" href="{{ asset('assets/css/navigation.css') }}">

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
</head>
<body>
    <div id="app">
    @unless(request()->routeIs('login') || request()->routeIs('register'))
        <nav>
            <div class="nav-list">
                <ul>
                    <li>
                        <img src="{{asset('assets/images/chevron-right-solid (1).svg')}}" style="width: 20px; height: 20px; margin-right: 10px;"alt="">
                    </li>
                <li>
                    <a href="{{ route('walkthroughs.index') }}" class="nav-item {{ request()->routeIs('walkthroughs.index') ? 'active' : '' }}">
                        <img src="{{ asset('assets/images/house-solid (1).svg') }}" alt="" style="width: 20px; height: 20px; margin-right: 10px;">
                        <span class="nav-text">Home</span>
                    </a>
                </li>
                <li>
                    @auth
                    <a href="{{ route('profile', Auth::user()->name) }}" class="nav-item {{ request()->routeIs('profile') ? 'active' : '' }}">
                        <img src="{{ asset('assets/images/user-solid (2).svg') }}" alt="" style="width: 20px; height: 20px; margin-right: 10px;">
                        <span class="nav-text">{{ Auth::user()->name }}</span>
                    </a>
                    @endauth
                </li>
                <li><a href="{{route('FAQ.index')}}">FAQ</a></li>
                <li><a href="{{route('contacts.index')}}">Contact</a></li>

                @auth
                @if(Auth::user()->is_admin)
                <li><a href="{{route('admin.index')}}">Users</a></li>
                @endif
                @endauth

                @unless(Auth::check())
                <li><a href="{{route('login')}}">login</a></li>
                <li><a href="{{route('register')}}">register</a></li>
                @endunless
                </ul>
            </div>
        </nav>
    @endunless

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
