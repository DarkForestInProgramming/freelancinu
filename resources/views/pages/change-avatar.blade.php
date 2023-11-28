<x-layout docTitle='Profilio Nuotraukos Keitimas'>
<div class="container mx-auto py-4">        
        <form class="max-w-md mx-auto bg-white md:shadow-md rounded px-8 pt-6 pb-8 mb-4" action="/change-avatar" method="POST" enctype="multipart/form-data">  
            <div class="mb-8 flex flex-col items-center">
                <img src="https://res.cloudinary.com/dp0m5mp1s/image/upload/v1700909453/Freelancinu/freelancinu_logo.png" width="100" alt="Freelancinu"/>
                <h1 class="mb-2 text-2xl">Profilio nuotraukos keitimas</h1>
                <span class="text-gray-400">Atsinaujinkite savo išvaizdą</span>
            </div>
            
            @csrf
            <div class="mb-4">
                <input id="avatar" name="avatar" type="file">
                @error('avatar')
                <p class="bg-red-200 text-sm text-red-800 py-3 px-2 mt-1 rounded shadow-sm">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <button type="submit" class="w-full bg-laravel font-semibold uppercase text-white py-2 hover:bg-black transition duration-300">Išsaugoti</button>
            </div>

        </form>
    </div>
</x-layout>