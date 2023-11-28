<x-layout :docTitle="$post->title">
<div class="py-4">
    <div class="max-w-7xl mx-auto bg-white rounded-lg md:shadow-md p-6 sm:flex items-start">
        <!--Left side -->
        <div class="w-full sm:w-1/6 p-6 text-center border-b md:border-none">
            <a href="/profile/{{$post->user->username}}">
            <h1 class="text-2xl font-bold mb-2">{{$post->user->username}}</h1>
           </a>

            <div class="flex items-center justify-center w-24 h-24 rounded-full shadow-md mb-4 mx-auto">
                <img src="{{$post->user->avatar}}" alt="{{$post->user->username}}" class="w-24 h-24 rounded-full">
            </div>
            
            <button class="bg-laravel/80 text-center text-white font-thin py-1 px-8 mb-2 rounded">{{$post->user->role}}</button>
            <div class="flex items-center justify-center text-gray-500 text-sm">
                <span>Prisijungė: {{$post->user->created_at->format('Y-m-d')}}</span>
            </div>

            @auth
            <div class="flex justify-center mt-3">
            @if(!$currentlyFollowing AND auth()->user()->username != $post->user->username)
            <form action="/create-follow/{{$post->user->username}}" method="POST">
            @csrf
                <button type="submit" class="text-white block text-center font-semibold uppercase text-xs leading-6 px-3 py-1 bg-gray-900 hover:bg-black hover:text-white"><i class="fa-solid fa-user-plus fa-sm"></i> Sekti</button>
            </form>
            @endif
            @if ($currentlyFollowing)
            <form action="/remove-follow/{{$post->user->username}}" method="POST">
                @method("DELETE")
                @csrf
                    <button type="submit" class="text-white block text-center font-semibold uppercase text-xs leading-6 px-3 py-1 bg-laravel hover:bg-black hover:text-white"><i class="fa-solid fa-user-times fa-sm"></i> Nebesekti</button>
                </form>
            @endif
            </div>      
            @endauth 
        </div>
        
        <!-- Right Side -->
        <div class="w-full sm:w-5/6 bg-white p-6 sm:mt-0">
            <h2 class="text-2xl font-bold mb-2">{{$post->title}}</h2>
            <p class="text-sm text-gray-500 mb-2">Paskelbta: {{$post->created_at->format('Y-m-d')}}</p>
            <p class="text-lg mb-6">
                {!! $post->body !!}
            </p>
            <div class="flex justify-end items-center mb-4">
                @can('update', $post)
                <div>
                    <form action="/post/{{$post->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <a href="/post/{{$post->id}}/edit" title="Įrašo redagavimas" class="text-blue-500 hover:text-blue-600 mr-2"><i class="fa-solid fa-pen-to-square fa-lg"></i></a>
                    <button type="submit" title="Įrašo trinimas" class="text-laravel hover:text-red-600"><i class="fa-solid fa-xmark fa-lg"></i></button>
                </form>
                </div>
                @endcan
            </div>
            
        </div>
        
    </div>
        {{-- <!-- Comment section -->
        <div class="max-w-7xl mx-auto bg-white rounded-lg shadow-md p-6 mt-6">
            <h2 class="text-2xl font-bold mb-4">Komentarai</h2>
            <!-- Komentarų rašymo forma -->
            <form action="/post/comment" method="POST" class="mb-8">
                @csrf
                <!-- Formos laukai... -->
                <textarea name="comment" rows="4" class="w-full border rounded-md p-2 mb-2" placeholder="Rašykite komentarą"></textarea>
                <button type="submit" class="bg-black text-white border border-laravel font-semibold uppercase px-4 py-2 rounded-md hover:bg-laravel">Atsakyti</button>
            </form>
            
            <!-- Komentarų atvaizdavimas -->
            <div class="border-t pt-4">
        </div>
    </div> --}}
    
</div>
</x-layout>