@extends('layouts.app')

@section('content')
<div class="container mx-auto my-32">
    <div>
        <div class="bg-white relative shadow rounded-lg w-5/6 md:w-5/6 lg:w-4/6 xl:w-3/6 mx-auto">
            <div class="flex justify-center">
                    <img src="{{$sharedData['avatar']}}" alt="{{$sharedData['username']}}" class="rounded-full mx-auto absolute -top-20 w-32 h-32 shadow-md border-4 border-white transition duration-200 transform hover:scale-110" />
            </div>
    
            <div class="mt-16">
                <div class="text-center border-b">
                    
                    @if(auth()->user()->username === $sharedData['username'])
                    <div class="my-4">
                        <a href="/change-avatar" class="hover:text-laravel">Keisti profilio nuotrauką</a>
                    </div>
                    @endif

                <h1 class="font-bold text-center text-3xl text-gray-900">{{$sharedData['username']}}</h1>
                <button class="bg-laravel/80 text-center text-white font-thin py-1 px-8 mt-2 mb-4 rounded">{{$sharedData['role']}}</button>
            </div>
            
                <div class="flex items-center justify-center my-4 px-6">
                    @auth
                    @if(!$sharedData['currentlyFollowing'] AND auth()->user()->username != $sharedData['username'])
                    <form action="/create-follow/{{$sharedData['username']}}" method="POST">
                        @csrf
                    <button type="submit" class="text-white block text-center font-semibold uppercase text-sm leading-6 px-4 py-2 bg-gray-900 hover:bg-black hover:text-white"><i class="fa-solid fa-user-plus fa-sm"></i> Sekti</button>
                    </form>
                    @endif

                    @if($sharedData['currentlyFollowing'])
                    <form action="/remove-follow/{{$sharedData['username']}}" method="POST">
                        @csrf
                        @method('DELETE')
                    <button type="submit" class="text-white block text-center font-semibold uppercase leading-6 px-4 py-2 bg-laravel text-sm hover:bg-black hover:text-white"><i class="fa-solid fa-user-times fa-sm"></i> Nebesekti</button>
                    </form>
                    @endif
                    
                    @endauth
                </div>

                <div class="flex justify-between items-center my-5 px-6 border-b">
                    <a href="/profile/{{$sharedData['username']}}" class="text-gray-500 hover:text-gray-900 hover:bg-gray-100 rounded transition duration-150 ease-in font-medium text-sm text-center w-full py-3">Įrašų: {{$sharedData['postCount']}}</a>
                    <a href="/profile/{{$sharedData['username']}}/followers" class="text-gray-500 hover:text-gray-900 hover:bg-gray-100 rounded transition duration-150 ease-in font-medium text-sm text-center w-full py-3">Sekėjų: {{$sharedData['followerCount']}} </a>
                    <a href="/profile/{{$sharedData['username']}}/following" class="text-gray-500 hover:text-gray-900 hover:bg-gray-100 rounded transition duration-150 ease-in font-medium text-sm text-center w-full py-3">Sekama: {{$sharedData['followingCount']}} </a>
                </div>

                <div class="profile-slot-content">
                    {{$slot}}
                </div>

            </div>
        </div>

    </div>
</div>
@endsection