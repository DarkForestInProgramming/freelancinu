<x-profile :sharedData="$sharedData" docTitle="{{$sharedData['username']}} Profilis">
    <div class="w-full">
        <h3 class="font-medium text-gray-900 text-left px-6">"{{$sharedData['username']}}" veikla</h3>
        <div class="mt-5 w-full flex flex-col items-center overflow-hidden text-sm">
            @foreach ($posts as $post)
            <a href="/post/{{$post->id}}" class="w-full border-t border-gray-100 text-gray-600 py-4 pl-6 pr-3 block hover:bg-gray-100 transition duration-150">
                <img src="{{$sharedData['avatar']}}" alt="{{$sharedData['username']}}" class="rounded-full h-6 shadow-md inline-block mr-2">
                <span class="font-semibold">{{$post->title}}</span>
                    <span class="text-gray-500 text-xs">sukurta {{$post->created_at->format('Y-m-d')}}</span>
            </a>
            @endforeach
            <div class="my-4">{{$posts->links()}}</div>                
        </div>
    </div>
</x-profile>