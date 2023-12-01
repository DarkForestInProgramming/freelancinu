<x-layout docTitle='Paskyros Patvirtinimas'>
<div class="flex justify-center items-center py-4">
    <div class="bg-white p-6 rounded-lg shadow-md">
        @if(auth()->user() && auth()->user()->hasVerifiedEmail())
            <h2 class="text-2xl font-bold mb-4">Jūsų El. Paštas Patvirtintas</h2>
            <p class="text-gray-600 mb-4">
                Dabar galite pilnai naudotis savo paskyra ir jos funkcijomis.
            </p>
        @else
    @include('partials._confRegistration')
        @endif
    </div>
</div>
</x-layout>