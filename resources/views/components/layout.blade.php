<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta
    name="description"
    content="Freelancinu - laisvai samdomų darbuotojų patirties dalinimosi, ryšių kūrimo platforma."
  />
    <title>
    @isset($docTitle)
    {{$docTitle}} | Freelancinu
    @else
    Freelancinu
    @endisset
    </title>
    {{-- Favicon --}}
    <link rel="apple-touch-icon" sizes="76x76" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="theme-color" content="#ffffff">
    <!-- Icons-->
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
    integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer"/>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <!-- Styles -->
    @vite(['resources/css/app.css'])
    <!-- JavaScript -->
    @vite(['resources/js/app.js'])
</head>

<body class="bg-gray-50">
    @section('header')
    @include('partials._header')
    @if(session()->has('success'))
    <x-toast />
    @endif
    @if(session()->has('error'))
    <x-toast />
    @endif
    <main>{{$slot}}</main>
    @section('footer')
    @include('partials._footer')
    @show 
    @auth
    <div data-username="{{auth()->user()->username}}" data-avatar="{{auth()->user()->avatar}}" id="chat-wrapper" class="chat-wrapper shadow-md border-t border-l border-r"></div>
    @endauth
    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>
