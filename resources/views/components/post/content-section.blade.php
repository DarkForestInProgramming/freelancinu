<div class="w-full sm:w-5/6 bg-white p-6 sm:mt-0">
    <h2 class="text-2xl font-bold mb-2">{{$post->title}}</h2>
    <p class="text-sm text-gray-500 mb-2">Paskelbta: {{$post->created_at->format('Y-m-d')}}</p>
    <p class="text-lg mb-6">
        {!! $post->body !!}
    </p>
    <div class="flex justify-end items-center mb-4">
        @can('update', $post)
        <div>
            <form action="/topic/{{$post->id}}" method="POST">
                @csrf
                @method('DELETE')
                <a href="/topic/{{$post->slug}}/edit" title="Įrašo redagavimas" class="text-blue-500 hover:text-blue-600 mr-2"><i class="fa-solid fa-pen-to-square fa-lg"></i></a>
            <button type="submit" title="Įrašo trinimas" class="text-laravel hover:text-red-600"><i class="fa-solid fa-xmark fa-lg"></i></button>
        </form>
        </div>
        @endcan
    </div>
</div>