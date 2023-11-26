@extends('layouts.app')

@section('content')
<div class="container mx-auto py-4">
        <form class="max-w-md mx-auto bg-white md:shadow-md rounded px-8 pt-6 pb-8 mb-4" action="/login" method="POST">
            @csrf
            
            <div class="mb-8 flex flex-col items-center">
                <img src="https://res.cloudinary.com/dp0m5mp1s/image/upload/v1700909453/Freelancinu/freelancinu_logo.png" width="100" alt="Freelancinu"/>
                <h1 class="mb-2 text-2xl">Prisijungimas</h1>
                <span class="text-gray-400">Sugrįžkite į diskusijas</span>
            </div>

            <div class="mb-4">
                <label for="email" class="block mb-1 text-sm text-gray-500 font-medium">El. paštas</label>
                <input id="email" name="email" placeholder="pavyzdys@gmail.com" class="w-full px-4 py-2 rounded-md border border-gray-300 focus:outline-none focus:border-blue-500">
                @error('email')
                <p class="bg-red-200 text-sm text-red-800 py-3 px-2 mt-1 rounded shadow-sm">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password" class="block mb-1 text-sm text-gray-500 font-medium">Slaptažodis</label>
                <input type="password" id="password" name="password" placeholder="••••••••" class="w-full px-4 py-2 rounded-md border border-gray-300 focus:outline-none focus:border-blue-500">
                @error('password')
                <p class="bg-red-200 text-sm text-red-800 py-3 px-2 mt-1 rounded shadow-sm">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <button type="submit" class="w-full bg-laravel text-white font-semibold uppercase py-2 hover:bg-black transition duration-300">Prisijungti</button>
            </div>

            <p class="mt-6 text-center text-sm text-gray-600">Esate naujas narys? <a href="/register" class="text-blue-500 hover:underline">Registruokitės čia</a></p>
        </form>
</div>
@endsection