<div class="w-full sm:w-5/6 bg-white p-6 sm:mt-0">
    <p class="text-sm text-gray-500 mb-2">Atsakė: {{$comment->created_at->format('Y-m-d')}}</p>
    <p class="text-lg mb-6">
        {!! $comment->body !!}
    </p>
    <div class="flex justify-end items-center mb-4">
        @can('update', $comment)
        <div>
            <form action="/comment/{{$comment->id}}" method="POST">
                @csrf
                @method('DELETE')
            <button type="submit" title="Komentaro trinimas" class="text-laravel hover:text-red-600"><i class="fa-solid fa-xmark fa-lg"></i></button>
        </form>
        </div>
        @endcan
    </div>
</div>