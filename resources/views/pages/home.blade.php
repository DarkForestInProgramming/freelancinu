<x-layout>
<div>
@include('partials._hero')
<div class="container mx-auto px-4">
<x-home.category-card :categories="$categories" />
</div>
</div>
</x-layout>
