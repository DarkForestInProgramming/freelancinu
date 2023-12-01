    <section
    class="relative h-72 bg-laravel flex flex-col justify-center align-center text-center space-y-4 mb-4">
    <div
    class="absolute top-0 left-0 w-full h-full opacity-10 bg-no-repeat bg-center"
    style="background-image: url('https://res.cloudinary.com/dp0m5mp1s/image/upload/v1701459404/Freelancinu/hero_logo.png')">
    </div>
    <div class="z-10">
    <h1 class="text-5xl md:text-6xl font-bold uppercase text-white">
        Free<span class="text-black">Lancinu</span>
    </h1>
    <p class="text-xl md:text-2xl text-gray-200 font-bold my-4">
        Pasidalink savo patirtimi & atrask bendraminčių
    </p>
    @auth
    @else
    <div>
        <a
        href="/register"
        class="inline-block border-2 border-white text-white py-2 px-4 rounded-xl uppercase mt-2 hover:text-black hover:border-black"
        >Junkis prie mūsų</a>
        </div>
    @endauth
    </div>
    </section>
