<ol class="flex items-center text-xs md:text-sm space-x-2 mb-2" aria-label="Breadcrumb">
    <li class="inline-flex items-center">
    <a class="flex items-center text-gray-500 hover:text-laravel focus:outline-none focus:text-laravel" href="/">
        Pagrindinis
    </a>
    </li>
    <span class="text-gray-400">/</span>
    <li class="inline-flex items-center">
    <a class="flex items-center text-gray-500 hover:text-laravel focus:outline-none focus:text-laravel" href="/category/{{$subcategory->category->slug}}">
        {{$subcategory->category->name}}
    </a>
    </li>
    <span class="text-gray-400">/</span>
    <li class="inline-flex items-center font-semibold text-gray-800 truncate" aria-current="page">
    {{$subcategory->name}}
    </li>
</ol>
