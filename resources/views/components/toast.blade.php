@if(Session::has('success'))
<div class="max-w-lg mx-auto mt-4 mb-4">
<div class="bg-green-500 text-white px-4 py-4 mb-3 text-center rounded-md shadow-md">
    <p class="text-sm">{{Session::get('success')}}</p>
</div>
</div>
@endif

@if(Session::has('error'))
<div class="max-w-lg mx-auto mt-4 mb-4">
<div class="bg-red-500 text-white px-4 py-4 mb-3 text-center rounded-md shadow-md">
    <p class="text-sm">{{Session::get('error')}}</p>
</div>
</div>
@endif