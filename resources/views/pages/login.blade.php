@extends('layouts.app')

@section('content')
<div class="flex items-center justify-center">
    <div class="max-w-md w-full p-6 bg-white rounded-lg shadow-md">
        <div class="mb-8 flex flex-col items-center">
            <img src="logo.png" width="100" alt="" srcset="" />
            <h1 class="mb-2 text-2xl">Prisijungimas</h1>
            <span class="text-gray-400">Įveskite prisijungimo duomenis</span>
          </div>
        <form action="/login" method="POST" class="space-y-4">
            @csrf
            <div>
                <label for="email" class="block mb-1 text-sm text-gray-500 font-medium">El. paštas</label>
                <input id="email" name="email" placeholder="pavyzdys@gmail.com" class="w-full px-4 py-2 rounded-md border border-gray-300 focus:outline-none focus:border-blue-500">
                @error('email')
                <p class="bg-red-200 text-sm text-red-800 py-3 px-2 mt-1 rounded shadow-sm">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="password" class="block mb-1 text-sm text-gray-500 font-medium">Slaptažodis</label>
                <input type="password" id="password" name="password" placeholder="••••••••" class="w-full px-4 py-2 rounded-md border border-gray-300 focus:outline-none focus:border-blue-500">
                @error('password')
                <p class="bg-red-200 text-sm text-red-800 py-3 px-2 mt-1 rounded shadow-sm">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <button type="submit" class="w-full bg-laravel text-white py-2 rounded-md hover:bg-red-600 transition duration-300">Prisijungti</button>
            </div>
        </form>
        <p class="mt-4 text-center text-sm text-gray-600">Esate naujas narys? <a href="/register" class="text-blue-500 hover:underline">Registruokitės čia</a></p>
    </div>
</div>
@endsection