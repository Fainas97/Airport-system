<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <title>@yield('title')</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>
    <div class="header">
        <h1>@yield('header')</h1>
    </div>
    <div class="container">
        @if(session('success'))
        <div class="success" style="text-align: center">
            <p>{{session('success')}}</p>
        </div>
        @endif
        @if($errors->any())
        @foreach ($errors->all() as $error)
        <div class="errors" style="text-align: center">
            <p>{{ $error }}</p>
        </div>
        @endforeach
        @endif
        <ul class="nav nav-tabs" style="border: none;">
            <li class="nav-item">
                <a href="/airports" class="nav-link {{Request::path() == 'airports' ? 'active' : ''}}">
                    Airports
                </a>
            </li>
            <li class="nav-item">
                <a href="/companies" class="nav-link {{Request::path() == 'companies' ? 'active' : ''}}">
                    Companies
                </a>
            </li>
            <li class="nav-item">
                <a href="/countries" class="nav-link {{Request::path() == 'countries' ? 'active' : ''}}">
                    Countries
                </a>
            </li>
        </ul>
        @yield('content')
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    <script>

    </script>
</body>

</html>