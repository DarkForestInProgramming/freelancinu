<div class="flex items-center space-x-1 md:space-x-2 text-xs md:text-sm hover:text-gray-500">
    <a class="md:font-semibold" href="/topic/{{$post->slug}}" title="Tema: {{$post->title}}">{{$post->title}}</a>
    <span>|</span>
    <img class="w-6 h-6 rounded-full" src="{{ $post->user->avatar }}" alt="{{ $post->user->username }}" />
<a href="/profile/{{$post->user->slug}}" title="Narys: {{$post->user->username}}">
    {{ $post->user->username }}
</a>
</div>