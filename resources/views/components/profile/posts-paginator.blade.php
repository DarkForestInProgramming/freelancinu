<div class="my-4">
    <ul class="flex justify-center space-x-2">
        @if ($posts->currentPage() > 1)
            <li>
                <a href="{{ $posts->previousPageUrl() }}" class="border px-3 py-1 hover:text-gray-500">Ankstesnis</a>
            </li>
        @endif

        @for ($i = 1; $i <= $posts->lastPage(); $i++)
            <li>
                <a href="{{ $posts->url($i) }}" class="border px-3 py-1 rounded hover:text-gray-500 ">{{ $i }}</a>
            </li>
        @endfor

        @if ($posts->hasMorePages())
            <li>
                <a href="{{ $posts->nextPageUrl() }}" class="border rounded px-3 py-1 hover:text-gray-500">Sekantis</a>
            </li>
        @endif
    </ul>
</div>