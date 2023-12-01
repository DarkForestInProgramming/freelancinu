<li class="flex items-center justify-between border-gray-200">
    <a class="hover:text-gray-500 text-md font-semibold" href="/topic/{{$post->slug}}" title="Tema: {{$post->title}}">
    {{$post->title}}
</a>
    <div class="flex items-center text-sm space-x-2">
        <span class="mt-3">Atsakė:</span>
        <img class="w-6 h-6 mt-3 rounded-full" src="{{$post->user->avatar}}" alt="{{ $post->user->username }}">
        <a class="mt-3" href="/profile/{{$post->user->slug}}" title="Narys: {{$post->user->username}}">{{ $post->user->username }}</a>
    </div>
</li>
<div class="text-gray-400 text-xs md:text-sm border-b mb-4">
    <a class="hover:text-gray-500" href="/profile/{{$post->user->slug}}" title="Narys: {{$post->user->username}}">Pradėjo {{$post->user->username}}, {{$post->created_at->format('Y-m-d')}}</a>
</div>