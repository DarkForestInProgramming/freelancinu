<x-profile.profile :sharedData="$sharedData" docTitle="{{$sharedData['username']}} Sekėjai">
    <div class="w-full">
        <h3 class="font-medium text-gray-900 text-left px-6">Sekėjai:</h3>
        <div class="mt-5 w-full flex flex-col items-center overflow-hidden text-sm">
            @foreach ($followers as $follow)
            <a href="/profile/{{$follow->userDoingTheFollowing->slug}}" class="w-full border-t border-gray-100 text-gray-600 py-4 pl-6 pr-3 block hover:bg-gray-100 transition duration-150">
                <img src="{{$follow->userDoingTheFollowing->avatar}}" alt="{{$follow->userDoingTheFollowing->slug}}" class="rounded-full h-6 shadow-md inline-block mr-2">
                <span class="font-semibold">{{$follow->userDoingTheFollowing->username}}</span>
            </a>
            @endforeach
            @if($followers->count() >= 5)
            <x-profile.followers-paginator :followers="$followers"/>
            @endif                         
        </div>
    </div>
</x-profile.profile>