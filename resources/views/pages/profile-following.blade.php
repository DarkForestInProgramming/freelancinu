<x-profile :sharedData="$sharedData">
    <div class="w-full">
        <h3 class="font-medium text-gray-900 text-left px-6">"{{$sharedData['username']}}" sekami nariai</h3>
        <div class="mt-5 w-full flex flex-col items-center overflow-hidden text-sm">
            @foreach ($following as $follow)
            <a href="/profile/{{$follow->userBeingFollowed->username}}" class="w-full border-t border-gray-100 text-gray-600 py-4 pl-6 pr-3 w-full block hover:bg-gray-100 transition duration-150">
                <img src="{{$follow->userBeingFollowed->avatar}}" alt="{{$follow->userBeingFollowed->username}}" class="rounded-full h-6 shadow-md inline-block mr-2">
                <span class="font-semibold">{{$follow->userBeingFollowed->username}}</span>
            </a>
            @endforeach
            <div class="my-4">{{$following->links()}}</div>                     
        </div>
    </div>
</x-profile>