@if(Session::has('success'))
<div class="max-w-xs md:max-w-lg lg:max-w-lg mx-auto mb-4">
<div class="bg-green-500 text-white px-4 py-4 mb-3 text-center rounded-md shadow-md">
    <p>{{Session::get('success')}}</p>
</div>
</div>
@endif

@if(Session::has('error'))
<div class="max-w-xs md:max-w-lg lg:max-w-lg  mx-auto mb-4">
<div class="bg-red-500 text-white px-4 py-4 mb-3 text-center rounded-md shadow-md">
    <p>{{Session::get('error')}}</p>
</div>
</div>
@endif