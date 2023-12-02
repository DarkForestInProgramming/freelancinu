<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 px-4 md:px-0 mb-48">
    @foreach ($categories as $category)
        <div class="bg-white border border-gray-200 rounded p-4 shadow-md relative mx-auto">
            <div class="flex justify-center">
                <a href="/category/{{$category->slug}}" title="Kategorija: {{$category->slug}}">
                    <div class="rounded-full w-32 h-32 md:w-44 md:h-44 shadow-md border-4 border-white transition duration-200 transform hover:scale-110 flex items-center justify-center">
                    <img class="w-full h-full object-cover rounded-full" src="{{$category->image}}" alt="{{$category->title}}" />
                </div>
                </a>
            </div>
            <div class="mt-4">
                <h3 class="text-xl md:text-2xl font-semibold">
                    <a href="/category/{{$category->slug}}" title="Kategorija: {{$category->slug}}">{{$category->name}}</a>
                </h3>
                <ul class="flex flex-wrap mt-2">
                    @foreach ($category->subcategories as $subcategory)
                        <li class="bg-black text-white rounded-xl py-1 px-3 mr-2 mb-2 text-xs hover:text-gray-300">
                            <a href="/subcategory/{{$subcategory->slug}}" title="Subkategorija: {{$subcategory->name}}">{{$subcategory->name}}</a>
                        </li>
                    @endforeach
                </ul>
                <p class="text-sm text-gray-500 mt-2">{{$category->description}}</p>
                @foreach($category->posts->sortByDesc('created_at')->take(1) as $post)
                    <div class="flex items-center mt-4">
                        <span class="text-xs font-light text-laravel mr-2">Nauja</span>
                        <a class="hover:text-gray-500 text-sm font-semibold truncate" href="/topic/{{$post->slug}}" title="Tema: {{$post->title}}">
                            {{$post->title}}
                        </a>
                    </div>
                    <div class="flex items-center text-xs mt-1">
                        <span>Pradėjo:</span>
                        <img class="w-6 h-6 rounded-full ml-2" src="{{$post->user->avatar}}" alt="{{$post->user->username}}" />
                        <a class="ml-1 hover:text-gray-500" href="/profile/{{$post->user->slug}}" title="Narys: {{$post->user->username}}">{{$post->user->username}}</a>
                    </div>
                @endforeach
            </div>
        </div>
    @endforeach
</div>