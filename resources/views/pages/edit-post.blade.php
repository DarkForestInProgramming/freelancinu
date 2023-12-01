<x-layout docTitle="Įrašo {{$post->title}} Redagavimas">
<div class="container mx-auto py-4">
    <x-edit-post.edit-form :post="$post" :categories="$categories" />
</div>
</x-layout>