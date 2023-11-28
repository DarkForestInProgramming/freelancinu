<x-layout docTitle="Įrašo {{$post->title}} Redagavimas">
<div class="container mx-auto py-4">
    <form class="max-w-md mx-auto bg-white md:shadow-md rounded px-8 pt-6 pb-8 mb-4" action="/post/{{$post->id}}" method="POST">
        @csrf
        @method("PUT")

        <div class="mb-8 flex flex-col items-center">
            <img src="https://res.cloudinary.com/dp0m5mp1s/image/upload/v1700909453/Freelancinu/freelancinu_logo.png" width="100" alt="Freelancinu">
            <h1 class="mb-2 text-2xl">Įrašo redagavimas</h1>
            <span class="text-gray-400">Redaguokite savo mintis</span>
        </div>

        <div class="mb-4">
            <label for="title" class="block mb-1 text-sm text-gray-500 font-medium">Pavadinimas: <span class="ml-2 text-xs text-red-500 uppercase">Būtinas</span></label>
            <input value="{{@old('title', $post->title)}}" type="text" id="title" name="title" class="w-full title bg-gray-100 border border-gray-300 p-2 outline-none rounded">
            @error('title')
            <p class="bg-red-200 text-sm text-red-800 py-3 px-2 mt-1 rounded shadow-sm">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="category" class="block mb-1 text-sm text-gray-500 font-medium">Kategorija: <span class="ml-2 text-xs text-red-500 uppercase">Būtinas</span></label>
            <select id="category" name="category_id" class="w-full rounded-md border border-gray-300 px-3 py-2">
                <option value="">Pasirinkite kategoriją</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id')
            <p class="bg-red-200 text-sm text-red-800 py-3 px-2 mt-1 rounded shadow-sm">{{ $message }}</p>
            @enderror
        </div>
    
        <div class="mb-4" id="subcategory-container" style="display: none;">
            <label for="subcategory" class="block mb-1 text-sm text-gray-500 font-medium">Sub-kategorija:</label>
            <select id="subcategory" name="subcategory_id" class="w-full rounded-md border border-gray-300 px-3 py-2">
                <option value="">Pasirinkite sub-kategoriją</option>
            </select>
        </div>
    
        <div class="mb-4" id="subsubcategory-container" style="display: none;">
            <label for="subsubcategory" class="block mb-1 text-sm text-gray-500 font-medium">Sub-sub-kategorija:</label>
            <select id="subsubcategory" name="subsubcategory_id" class="w-full rounded-md border border-gray-300 px-3 py-2">
                <option value="">Pasirinkite sub-sub-kategoriją</option>
            </select>
        </div>

        <div class="mb-4">
            <label for="content" class="block mb-1 text-sm text-gray-500 font-medium">Turinys: <span class="ml-2 text-xs text-red-500 uppercase">Būtinas</span></label>
            <textarea id="content" name="body" class="description w-full bg-gray-100 sec p-3 h-60 border border-gray-300 outline-none rounded" spellcheck="false">{{@old('body', $post->body)}}</textarea>
            @error('body')
            <p class="bg-red-200 text-sm text-red-800 py-3 px-2 mt-1 rounded shadow-sm">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <button type="submit" class="w-full bg-laravel text-white font-semibold uppercase px-4 py-2 hover:bg-black">Išsaugoti</button>
        </div>

        <div class="max-w-md mx-auto bg-green-100 border-l-4 border-green-500 text-green-700 px-4 py-3 rounded-md mt-4 mb-4">
            <p><strong>Informacija:</strong> Kurdami įrašą būkite budrūs ir susipažinkite su forumo taisyklėmis, kadangi keliant kenksmingus įrašus autoriaus paskyra bus <span class="underline">negrįžtamai</span> ištrinama.</p>
        </div>

    </form>
</div>
</x-layout>