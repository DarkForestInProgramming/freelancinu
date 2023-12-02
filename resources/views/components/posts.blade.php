<li class="flex items-center justify-between border-gray-200">
    <a class="hover:text-gray-500 text-base font-semibold" href="/topic/{{$post->slug}}" title="Tema: {{$post->title}}">
    {{$post->title}}
</a>
    {{-- <div class="md:flex items-center text-xs md:space-x-2">
        <span class="mt-1 ml-0.5 md:ml-0 lg:ml-0">Atsakė:</span>
        <img class="w-6 h-6 mt-1 ml-2 md:ml-0 rounded-full" src="{{$comment->user->avatar}}" alt="{{ $comment->user->username }}">
        <a class="mt-1 font-semibold hover:text-gray-400" href="/profile/{{$pomment->user->slug}}" title="Narys: {{$comment->user->username}}">{{ $comment->user->username }}</a>
    </div> --}}
</li>
<div class="text-gray-400 text-xs md:text-sm border-b mb-4">
    <a class="hover:text-gray-500" href="/profile/{{$post->user->slug}}" title="Narys: {{$post->user->username}}">Pradėjo {{$post->user->username}}, {{$post->created_at->format('Y-m-d')}}</a>
</div>
