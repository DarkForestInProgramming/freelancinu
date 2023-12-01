<x-layout :docTitle="$category->name">
<div class="py-4">
        <div class="w-11/12 lg:w-3/4 mx-auto bg-white overflow-hidden rounded-md shadow-md p-6 mb-6">
            <x-category.breadcrumb :category="$category"/>
            <h1 class="text-2xl md:text-4xl font-bold mb-4 border-b p-3">{{$category->name}}</h1>
            <h2 class="text-sm md:text-lg text-center bg-black py-2 md:py-3 text-white font-bold mb-4 rounded-lg">Sub-kategorijos</h2>
            <ul>
                @foreach ($category->subcategories as $subcategory)        
                <li class="flex items-center justify-between py-4 border-b border-gray-200">   
                    <x-category.subcategories :subcategory="$subcategory" />
                    @endforeach
                    @foreach($subcategory->posts->sortByDesc('created_at')->take(1) as $post)
                    <x-category.sub-post :post="$post" />
                    @endforeach
                </li>
            </ul>
            @include('partials._createBtn')
        </div>
    <div class="w-11/12 lg:w-3/4 mx-auto bg-white overflow-hidden rounded-md shadow-md p-6 mt-10">
        <ul>
            @if($category->posts()->whereNull('subcategory_id')->whereNull('subsubcategory_id')->count() > 0)
            @foreach($category->posts()->whereNull('subcategory_id')->whereNull('subsubcategory_id')->get() as $post)
            <x-posts :post="$post"/>
            @endforeach
            @else
            <p>Dar nėra sukurtų temų.</p>
            @endif
        </ul>
    </div>
</div>
</x-layout>