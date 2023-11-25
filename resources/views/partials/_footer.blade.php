<footer class="fixed bottom-0 left-0 w-full bg-laravel text-white font-semibold h-24 opacity-90">
    <div class="max-w-7xl mx-auto flex flex-col justify-center items-center h-full">
        <p class="mb-2">Visos teisės saugomos &copy; Freelancinu, {{ date("Y") }}.</p>
        @auth
        <a href="/create-post" class="bg-black uppercase text-white py-2 px-5">Talpinti Įrašą</a>
        @endauth
    </div>
</footer>