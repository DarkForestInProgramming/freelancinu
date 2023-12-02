<div class="w-full lg:w-1/4 p-6 text-center border-b md:border-none">
    <a href="/profile/{{$comment->user->slug}}" title="Narys: {{$comment->user->username}}">
    <h1 class="text-lg font-bold mb-4">{{$comment->user->username}}</h1>
</a>
    <div class="flex items-center justify-center w-28 h-28 rounded-md shadow-md mb-4 mx-auto">
        <a href="/profile/{{$comment->user->slug}}" title="Narys: {{$comment->user->username}}">
        <img src="{{$comment->user->avatar}}" alt="{{$comment->user->username}}" class="w-28 h-28 rounded-md">
    </a>
    </div>
    <button class="bg-laravel/80 text-center text-white font-thin py-1 px-8 mb-2 rounded-sm cursor-no-drop">{{$comment->user->role}}</button>
    <div class="flex items-center justify-center text-gray-500 text-sm">
        <span>Prisijungė: {{$comment->user->created_at->format('Y-m-d')}}</span>
    </div>
    {{-- @auth
    <div class="flex justify-center mt-3">
    @if(!$currentlyFollowing AND auth()->user()->username != $comment->user->username)
    <form action="/create-follow/{{$post->user->slug}}" method="POST">
    @csrf
        <button type="submit" class="text-white block text-center font-semibold uppercase text-xs leading-6 px-3 py-1 bg-gray-900 hover:bg-black hover:text-white"><i class="fa-solid fa-user-plus fa-sm"></i> Sekti</button>
    </form>
    @endif
    @if ($currentlyFollowing)
    <form action="/remove-follow/{{$comment->user->slug}}" method="POST">
        @method("DELETE")
        @csrf
            <button type="submit" class="text-white block text-center font-semibold uppercase text-xs leading-6 px-3 py-1 bg-laravel hover:bg-black hover:text-white"><i class="fa-solid fa-user-times fa-sm"></i> Nebesekti</button>
        </form>
    @endif
    </div>      
    @endauth  --}}
</div>