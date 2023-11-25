@extends('layouts.app')

@section('content')

<div class="bg-gray-100 min-h-screen py-12">
    <div class="max-w-7xl mx-auto bg-white rounded-lg shadow-md p-6 sm:flex items-start">
        <!-- Kairė pusė - vartotojo informacija -->
        <div class="w-full sm:w-1/6 p-6 text-center">
    
            <div class="flex items-center justify-center w-24 h-24 rounded-full bg-gray-300 mb-4 mx-auto">
                <img src="https://gravatar.com/avatar/f64fc44c03a8a7eb1d52502950879659?s=128" alt="{{$post->user->username}}" class="w-20 h-20 rounded-full">
            </div>
            <h1 class="text-2xl font-bold mb-2">{{$post->user->username}}</h1>
            <button class="bg-laravel/80 text-center text-white font-thin py-1 px-8 mb-2 rounded">Narys</button>
            <div class="flex items-center justify-center text-gray-500 text-sm">
                <span>Prisijungė: {{$post->user->created_at->format('Y-m-d')}}</span>
            </div>
            <div class="mt-6">
                <button href="#" class="text-blue-500 hover:underline">
                    <i class="fa-solid fa-user-plus"></i> Sekti</button>
            </div>
            
        </div>
        
        <!-- Dešinė pusė - įkėlimo laikas ir turinys -->
        <div class="w-full sm:w-5/6 bg-white p-6 sm:mt-0">
            <h2 class="text-2xl font-bold mb-2">{{$post->title}}</h2>
            <p class="text-sm text-gray-500 mb-2">Paskelbta: {{$post->created_at->format('Y-m-d')}}</p>
            <p class="text-lg mb-6">
                {!! $post->body !!}
            </p>
            <div class="flex justify-between items-center mb-4">
                <div class="text-gray-500 text-sm">
                    <span>Paspaudimų skaičius: 0</span>
                    <span class="mx-2">•</span>
                    <span>Atsakymų skaičius: 0</span>
                </div>
                <div>
                    <button class="bg-blue-500 text-white px-3 md:px-5 py-2 md:py-3 rounded-md text-sm hover:bg-blue-600">Atsakyti</button>
                </div>
            </div>
            <div>
                <a href="#" class="text-gray-500 hover:underline">Žymės: #parduoda #kompas #parduodutel</a>
            </div>
        </div>
        
    </div>
        <!-- Komentarų forma ir atvaizdavimas -->
        <div class="max-w-7xl mx-auto bg-white rounded-lg shadow-md p-6 mt-6">
            <h2 class="text-2xl font-bold mb-4">Komentarai</h2>
            <!-- Komentarų rašymo forma -->
            <form action="/post/comment" method="POST" class="mb-8">
                @csrf
                <!-- Formos laukai... -->
                <textarea name="comment" rows="4" class="w-full border rounded-md p-2 mb-2" placeholder="Rašykite komentarą"></textarea>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Paskelbti komentarą</button>
            </form>
            
            <!-- Komentarų atvaizdavimas -->
            <div class="border-t pt-4">
                <!-- Pavyzdinis komentaras -->
                    <div class="flex items-start mb-4">
                        <div class="flex-shrink-0">
                            <img src="user-avatar.jpg" alt="Vartotojo avataras" class="w-10 h-10 rounded-full">
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-bold">VartotojoVardas</h3>
                            <p class="text-sm text-gray-500 mb-2">Komentaro data: 2023-11-23</p>
                            <p class="text-sm">Komentaro turinys čia...</p>
                        </div>
                <!-- Galima pridėti daugiau komentarų -->
            </div>
        </div>
        
    </div>
</div>
@endsection