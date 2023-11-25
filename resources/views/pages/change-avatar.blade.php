@extends('layouts.app')

@section('content')
<div class="flex items-center justify-center">
    <div class="max-w-md w-full p-6 bg-white rounded-lg shadow-md">
        <div class="mb-8 flex flex-col items-center">
            <img src="logo.png" width="100" alt="" srcset="" />
            <h1 class="mb-2 text-2xl">Profilio nuotraukos keitimas</h1>
            <span class="text-gray-400">Atsinaujinkite savo išvaizdą</span>
        </div>
        <form class="space-y-4" action="/change-avatar" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <input id="avatar" name="avatar" type="file">
                @error('avatar')
                <p class="bg-red-200 text-sm text-red-800 py-3 px-2 mt-1 rounded shadow-sm">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <button type="submit" class="w-full bg-black border border-laravel font-semibold uppercase text-white py-2 rounded-md hover:bg-laravel transition duration-300">Išsaugoti</button>
            </div>
        </form>
    </div>
</div>
@endsection