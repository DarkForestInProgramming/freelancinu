@extends('layouts.app')

@section('content')
<div class="container mx-auto my-32">
    <div>
        <div class="bg-white relative shadow rounded-lg w-5/6 md:w-5/6 lg:w-4/6 xl:w-3/6 mx-auto">
            <div class="flex justify-center">
                    <img src="{{$avatar}}" alt="{{$username}}" class="rounded-full mx-auto absolute -top-20 w-32 h-32 shadow-md border-4 border-white transition duration-200 transform hover:scale-110" />
            </div>
    
            <div class="mt-16">
                <div class="text-center border-b">
                    
                    @if(auth()->user()->username === $username)
                    <div class="my-4">
                        <a href="/change-avatar" class="hover:text-laravel">Keisti profilio nuotrauką</a>
                    </div>
                    @endif

                <h1 class="font-bold text-center text-3xl text-gray-900">{{$username}}</h1>
                <button class="bg-laravel/80 text-center text-white font-thin py-1 px-8 mt-2 mb-4 rounded">{{$role}}</button>
            </div>
            
                <div class="flex items-center justify-center my-4 px-6">
                    @auth
                    @if(!$currentlyFollowing AND auth()->user()->username != $username)
                    <form action="/create-follow/{{$username}}" method="POST">
                        @csrf
                    <button type="submit" class="text-white block text-center font-semibold uppercase text-sm leading-6 px-4 py-2 bg-gray-900 hover:bg-black hover:text-white"><i class="fa-solid fa-user-plus fa-sm"></i> Sekti</button>
                    </form>
                    @endif

                    @if($currentlyFollowing)
                    <form action="/remove-follow/{{$username}}" method="POST">
                        @csrf
                        @method('DELETE')
                    <button type="submit" class="text-white block text-center font-semibold uppercase leading-6 px-4 py-2 bg-laravel text-sm hover:bg-black hover:text-white"><i class="fa-solid fa-user-times fa-sm"></i> Nebesekti</button>
                    </form>
                    @endif
                    
                    @endauth
                </div>

                <div class="flex justify-between items-center my-5 px-6 border-b">
                    <a href="" class="text-gray-500 hover:text-gray-900 hover:bg-gray-100 rounded transition duration-150 ease-in font-medium text-sm text-center w-full py-3">Įrašų: {{$postCount}}</a>
                    <a href="" class="text-gray-500 hover:text-gray-900 hover:bg-gray-100 rounded transition duration-150 ease-in font-medium text-sm text-center w-full py-3">Sekėjų: </a>
                    <a href="" class="text-gray-500 hover:text-gray-900 hover:bg-gray-100 rounded transition duration-150 ease-in font-medium text-sm text-center w-full py-3">Sekama: </a>
                </div>

                <div class="w-full">
                    <h3 class="font-medium text-gray-900 text-left px-6">Naujausia veikla</h3>
                    <div class="mt-5 w-full flex flex-col items-center overflow-hidden text-sm">
                        @foreach ($posts as $post)
                        <a href="/post/{{$post->id}}" class="w-full border-t border-gray-100 text-gray-600 py-4 pl-6 pr-3 w-full block hover:bg-gray-100 transition duration-150">
                            <img src="{{$avatar}}" alt="{{$username}}" class="rounded-full h-6 shadow-md inline-block mr-2">
                            <span class="font-semibold">{{$post->title}}</span>
                                <span class="text-gray-500 text-xs">sukurta {{$post->created_at->format('Y-m-d')}}</span>
                        </a>
                        @endforeach                     
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>
@endsection