<x-layout :docTitle="$post->title">
<div class="py-10 mb-48">
    <x-post.header-section :post="$post" />
    <div class="max-w-7xl mx-auto bg-white rounded-lg md:shadow-md p-6 sm:flex items-start">
        <x-post.user-section :post="$post" :currentlyFollowing="$currentlyFollowing"/>
        <x-post.content-section :post="$post" />
    </div>
    <x-post.comment-section />
</div>
</x-layout>