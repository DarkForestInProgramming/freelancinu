<x-layout :docTitle="$subsubcategory->name">
    <div class="py-10 mb-48">
            <div class="w-11/12 lg:w-3/4 mx-auto bg-white overflow-hidden rounded-md shadow-md p-6 mb-6">   
                <h1 class="text-2xl md:text-4xl font-bold mb-1 border-b p-3"> {{$subsubcategory->subcategory->category->name}} / {{$subsubcategory->subcategory->name}} / {{$subsubcategory->name}}</h1>
                @include('partials._createBtn')
            </div>
        <div class="w-11/12 lg:w-3/4 mx-auto bg-white overflow-hidden rounded-md shadow-md p-6 mt-10">
            <ul>
                @if($subsubcategory->posts()->whereNotNull('subsubcategory_id')->count() > 0)
                @foreach($subsubcategory->posts()->whereNotNull('subsubcategory_id')->get() as $post)
            <x-posts :post="$post"/>
                @endforeach
                @else
                <p class="text-sm md:text-base">Dar nėra sukurtų temų.</p>
                @endif
            </ul>
        </div>

    </div>
    </x-layout>