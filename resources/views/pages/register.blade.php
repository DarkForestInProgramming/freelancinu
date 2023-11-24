@extends('layouts.app')

@section('content')
<div class="flex items-center justify-center">
    <div class="max-w-md w-full p-6 bg-white rounded-lg shadow-md">
        <div class="mb-8 flex flex-col items-center">
            <img src="logo.png" width="100" alt="" srcset="" />
            <h1 class="mb-2 text-2xl">Registracija</h1>
            <span class="text-gray-400">Įveskite registracijos duomenis</span>
          </div>
        <form action="/register" method="POST" class="space-y-4">
            @csrf
            <div>
                <label for="username" class="block mb-1 text-sm text-gray-500 font-medium">Vartotojo vardas <span class="ml-2 text-xs text-red-500 uppercase">Būtinas</span></label>
                <input value="{{old('username')}}" type="text" id="username" name="username" placeholder="Freelanceris" class="w-full px-4 py-2 rounded-md border border-gray-300 focus:outline-none focus:border-blue-500">
                @error('username')
                <p class="bg-red-200 text-sm text-red-800 py-3 px-2 mt-1 rounded shadow-sm">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="email" class="block mb-1 text-sm text-gray-500 font-medium">El. paštas <span class="ml-2 text-xs text-red-500 uppercase">Būtinas</span></label>
                <input value="{{old('email')}}" type="text" id="email" name="email" placeholder="pavyzdys@gmail.com" class="w-full px-4 py-2 rounded-md border border-gray-300 focus:outline-none focus:border-blue-500">
                @error('email')
                <p class="bg-red-200 text-sm text-red-800 py-3 px-2 mt-1 rounded shadow-sm">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="password" class="block mb-1 text-sm text-gray-500 font-medium">Slaptažodis <span class="ml-2 text-xs text-red-500 uppercase">Būtinas</span></label>
                <input type="password" id="password" name="password" placeholder="••••••••" class="w-full px-4 py-2 rounded-md border border-gray-300 focus:outline-none focus:border-blue-500">
                @error('password')
                <p class="bg-red-200 text-sm text-red-800 py-3 px-2 mt-1 rounded shadow-sm">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="confirm-password" class="block mb-1 text-sm text-gray-500 font-medium">Pakartoti slaptažodį <span class="ml-2 text-xs text-red-500 uppercase">Būtinas</span></label>
                <input type="password" id="confirm-password" name="password_confirmation" placeholder="••••••••" class="w-full px-4 py-2 rounded-md border border-gray-300 focus:outline-none focus:border-blue-500">
                @error('password_confirmation')
                <p class="bg-red-200 text-sm text-red-800 py-3 px-2 mt-1 rounded shadow-sm">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <button type="submit" class="w-full bg-laravel text-white py-3 rounded-md hover:bg-red-600 transition duration-300">Registruotis</button>
            </div>
        </form>
        <div class="max-w-md mx-auto bg-green-100 border-l-4 border-green-500 text-green-700 px-4 py-3 rounded-md mt-4 mb-4">
            <p><strong>Informacija:</strong> Slaptažodį turi sudaryti nemažiau 8 elementų, tarp jų privalo būti didžioji raidė, skaičius ir simbolis.</p>
        </div>
        <p class="mt-4 text-center text-sm text-gray-600">Jau turite paskyrą? <a href="/login" class="text-blue-500 hover:underline">Prisijunkite čia</a></p>
    </div>
</div>
  @endsection