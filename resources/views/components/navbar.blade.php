<nav class="flex justify-between items-center w-full mb-4">
    <a href="/">
        <img class="w-24" src="https://res.cloudinary.com/dp0m5mp1s/image/upload/v1700909453/Freelancinu/freelancinu_logo.png" alt="Freelancinu logo" />
    </a>
    <ul class="flex space-x-6 mr-6 text-lg">
        @auth
        <a href="#" class="text-black header-search-icon" title="Paieška" data-toggle="tooltip" data-placement="bottom">
            <i class="fas fa-search"></i>
        </a>
        <a href="#" class="text-black header-chat-icon" title="Pokalbis" data-toggle="tooltip" data-placement="bottom">
            <i class="fas fa-comment"></i>
        </a>
            <a href="/profile/{{auth()->user()->username}}">
                <img title="Mano Paskyra" data-toggle="tooltip" data-placement="bottom" style="width: 32px; height: 32px; border-radius: 50%;" src="{{auth()->user()->avatar}}" />
            </a>
            <a class="hover:text-laravel" title="Įrašo kūrimas" href="/create-post">
                <i class="fa-sharp fa-solid fa-pen"></i> 
            </a>
            <form action="/logout" method="POST" class="ml-2">
                @csrf
                <button type="submit" title="Atsijungimas" class="hover:text-laravel"><i class="fa-solid fa-sign-out-alt"></i></button>
            </form>
        @else
        <li>
            <a href="/register" title="Registracija" class="hover:text-laravel">
                <i class="fa-solid fa-user-plus"></i> Registruotis</a
            >
        </li>
        <li>
            <a href="/login" title="Prisijungimas" class="hover:text-laravel">
                <i class="fa-solid fa-arrow-right-to-bracket"></i>
                Prisijungti</a
            >
        </li>
        @endauth
    </ul>
</nav>