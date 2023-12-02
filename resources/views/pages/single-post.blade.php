<x-layout :docTitle="$post->title">
<div class="py-10 mb-48">
    <x-post.header-section :post="$post" />
    <div class="max-w-7xl mx-auto bg-white rounded-lg md:shadow-md p-6 sm:flex items-start">
        <x-post.user-section :post="$post" :currentlyFollowing="$currentlyFollowing"/>
        <x-post.content-section :post="$post" />
    </div>
    <div class="max-w-7xl mx-auto bg-white rounded-lg md:shadow-md p-6 mt-6">
        <h2 class="text-2xl font-bold mb-4">Komentarai
            @if($commentsCount === 0)
            <span class="text-sm font-thin">(0)</span>
            @else
            <span class="text-sm font-thin">({{$commentsCount}})</span>
        @endif
        </h2>
        @auth
        @if ($post->user->id !== auth()->user()->id && !$currentUserComment)
            <x-post.write-comment :post="$post" />
        @endif
        @endauth
        @foreach ($post->comments as $comment)
            <div class="mx-auto p-6 border-t sm:flex items-start">
                <x-post.comment-user :post="$post" :comment="$comment" :currentlyFollowing="$currentlyFollowing" />
                <x-post.comment-content :post="$post" :comment="$comment" />
            </div>
        @endforeach
    </div>
</div>
</x-layout>