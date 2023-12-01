<div class="my-4">
    <ul class="flex justify-center space-x-2">
        @if ($following->currentPage() > 1)
            <li>
                <a href="{{ $following->previousPageUrl() }}" class="border px-3 py-1 hover:text-gray-500">Ankstesnis</a>
            </li>
        @endif

        @for ($i = 1; $i <= $following->lastPage(); $i++)
            <li>
                <a href="{{ $following->url($i) }}" class="border px-3 py-1 rounded hover:text-gray-500 ">{{ $i }}</a>
            </li>
        @endfor

        @if ($following->hasMorePages())
            <li>
                <a href="{{ $following->nextPageUrl() }}" class="border rounded px-3 py-1 hover:text-gray-500">Sekantis</a>
            </li>
        @endif
    </ul>
</div>