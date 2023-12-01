<footer class="w-full bg-laravel text-white font-semibold h-24 opacity-90 fixed bottom-0 left-0 right-0 overflow-y-auto">
    <div class="max-w-7xl mx-auto flex flex-col justify-center items-center h-full">
        <p class="mb-2">Visos teisės saugomos &copy; Freelancinu, {{ date("Y") }}.</p>
        @auth
        <a href="/create-topic" class="bg-black text-sm md:text-base uppercase text-white py-2 px-5">Kurti Temą</a>
        @endauth
    </div>
</footer>