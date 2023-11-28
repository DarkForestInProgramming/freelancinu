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

<body>
    @section('header')
    @include('partials._header')
    @if(session()->has('success'))
    <x-toast />
    @endif
    @if(session()->has('error'))
    <x-toast />
    @endif
    <main class="flex flex-col h-screen">{{$slot}}</main>
    @section('footer')
    @include('partials._footer')
    @show 
    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>
