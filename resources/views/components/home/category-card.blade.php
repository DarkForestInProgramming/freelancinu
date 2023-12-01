<div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
    @foreach ($categories as $category)
        <div class="bg-white border border-gray-200 rounded p-6 shadow-md">
            <div class="flex flex-col md:flex-row">
                <a href="/category/{{$category->slug}}">
                    <img class="w-full md:w-48 mr-6 md:block hover:scale-y-110 transition duration-500" src="no-image.png" alt="{{$category->title}}" />
                </a>
                <div class="mt-4 md:mt-0">
                    <h3 class="text-2xl">
                        <a href="/category/{{$category->slug}}">{{$category->name}}</a>
                    </h3>
                    <ul class="flex flex-wrap mt-2">
                        @foreach ($category->subcategories as $subcategory)
                            <li class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs hover:text-gray-300 mb-2">
                                <a href="/subcategory/{{$subcategory->slug}}" title="Subkategorija: {{$subcategory->name}}">{{$subcategory->name}}</a>
                            </li>
                        @endforeach
                    </ul>
                    <div class="mt-2 text-sm text-gray-600">
                        {{$category->description}}
                    </div>
                    @foreach($category->posts->sortByDesc('created_at')->take(1) as $post)
                    <div class="flex space-x-2 mt-4">
                        <span class="text-xs font-light text-laravel">Nauja</span>
                        <a class="hover:text-gray-500 font-semibold" href="/topic/{{$post->slug}}" title="Tema: {{$post->title}}">
                            {{$post->title}}
                        </a>
                        <span>|</span>
                        <span class="text-sm mt-1">Pradėjo:</span>
                        <img class="w-6 h-6 rounded-full" src="{{$post->user->avatar}}" alt="{{$post->user->username}}" />
                        <a class="text-sm mt-1" href="/profile/{{$post->user->slug}}" title="Narys: {{$post->user->username}}">{{$post->user->username}}</a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endforeach
</div>