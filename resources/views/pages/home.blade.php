<x-layout>
<div>
@include('partials._hero')
<x-home.category-card :categories="$categories" />
</div>
</x-layout>
