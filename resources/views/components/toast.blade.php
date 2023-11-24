@if(Session::has('success'))
<div class="max-w-sm mx-auto mt-4">
<div class="bg-green-500 text-white px-4 py-2 mb-3 rounded-md shadow-md">
    <p class="text-sm">{{Session::get('success')}}</p>
</div>
</div>
@endif

@if(Session::has('error'))
<div class="max-w-sm mx-auto mt-4">
<div class="bg-red-500 text-white px-4 py-2 mb-3 rounded-md shadow-md">
    <p class="text-sm">{{Session::get('error')}}</p>
</div>
</div>
@endif