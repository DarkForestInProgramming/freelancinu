<div class="ml-2 md:ml-0 lg:ml-0">
    <div class="max-w-7xl mx-auto flex items-start mb-5 lg:items-center">
        <a href="/profile/{{$post->user->slug}}" title="Narys: {{$post->user->username}}">
            <img class="w-14 h-14 rounded-md shadow-sm" src="{{$post->user->avatar}}" alt="{{$post->user->username}}">
        </a>
        <div class="ml-4">
            <h1 class="text-2xl font-bold">{{$post->title}}</h1>
            <p class="text-sm text-gray-600">Nuo 
                <a class="hover:text-gray-500" href="/profile/{{$post->user->slug}}" title="Narys: {{$post->user->username}}">{{$post->user->username}}</a>, <span class="text-gray-400">{{$post->created_at->format('Y-m-d')}}</span>
            </p>
        </div>
    </div>
</div>