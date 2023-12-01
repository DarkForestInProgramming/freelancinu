<form class="max-w-md mx-auto bg-white md:shadow-md rounded px-8 pt-6 pb-8 mb-4" action="/register" method="POST">
    @csrf
    <div class="mb-8 flex flex-col items-center">
        <img src="https://res.cloudinary.com/dp0m5mp1s/image/upload/v1700909453/Freelancinu/freelancinu_logo.png" width="100" alt="Freelancinu"/>
        <h1 class="mb-2 text-2xl">Registracija</h1>
        <span class="text-gray-400">Junkitės prie mūsų</span>
    </div>

    <div class="mb-4">
        <label for="username" class="block mb-1 text-sm text-gray-500 font-medium">Vartotojo vardas <span class="ml-2 text-xs text-red-500 uppercase">Būtinas</span></label>
        <input value="{{old('username')}}" type="text" id="username" name="username" placeholder="Freelanceris" class="w-full px-4 py-2 rounded-md border border-gray-300 focus:outline-none focus:border-blue-500">
        @error('username')
        <p class="bg-red-200 text-sm text-red-800 py-3 px-2 mt-1 rounded shadow-sm">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="email" class="block mb-1 text-sm text-gray-500 font-medium">El. paštas <span class="ml-2 text-xs text-red-500 uppercase">Būtinas</span></label>
        <input value="{{old('email')}}" type="text" id="email" name="email" placeholder="pavyzdys@gmail.com" class="w-full px-4 py-2 rounded-md border border-gray-300 focus:outline-none focus:border-blue-500">
        @error('email')
        <p class="bg-red-200 text-sm text-red-800 py-3 px-2 mt-1 rounded shadow-sm">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="password" class="block mb-1 text-sm text-gray-500 font-medium">Slaptažodis <span class="ml-2 text-xs text-red-500 uppercase">Būtinas</span></label>
        <input type="password" id="password" name="password" placeholder="••••••••" class="w-full px-4 py-2 rounded-md border border-gray-300 focus:outline-none focus:border-blue-500">
        @error('password')
        <p class="bg-red-200 text-sm text-red-800 py-3 px-2 mt-1 rounded shadow-sm">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="confirm-password" class="block mb-1 text-sm text-gray-500 font-medium">Pakartoti slaptažodį <span class="ml-2 text-xs text-red-500 uppercase">Būtinas</span></label>
        <input type="password" id="confirm-password" name="password_confirmation" placeholder="••••••••" class="w-full px-4 py-2 rounded-md border border-gray-300 focus:outline-none focus:border-blue-500">
        @error('password_confirmation')
        <p class="bg-red-200 text-sm text-red-800 py-3 px-2 mt-1 rounded shadow-sm">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <button type="submit" class="w-full bg-laravel text-white font-semibold uppercase py-2 hover:bg-black transition duration-300">Registruotis</button>
    </div>

    @include('partials._regInfo')

    <p class="mt-4 text-center text-sm text-gray-600">Jau turite paskyrą? <a href="/login" class="text-blue-500 hover:underline">Prisijunkite čia</a></p>
</form>