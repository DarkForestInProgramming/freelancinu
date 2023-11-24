<nav class="flex justify-between items-center mb-4">
            <a href="/"
                ><img class="w-24" src="logo.png" alt="" class="logo"
            /></a>
            <ul class="flex space-x-6 mr-6 text-lg">
                @auth
                    <a href="#" class="text-black mr-2 header-search-icon" title="Paieška" data-toggle="tooltip" data-placement="bottom"><i class="fas fa-search"></i></a>
                    <span class="text-black mr-2 header-chat-icon" title="Pokalbis" data-toggle="tooltip" data-placement="bottom"><i class="fas fa-comment"></i></span>
                    <a href="#" class="mr-2"><img title="Mano Paskyra" data-toggle="tooltip" data-placement="bottom" style="bg-black width: 32px; height: 32px; border-radius: 16px" src="https://gravatar.com/avatar/f64fc44c03a8a7eb1d52502950879659?s=128" /></a>
                    <a class="mr-2 hover:text-laravel" href="/create-post">
                        <i class="fa-sharp fa-solid fa-pen"></i> Kurti Įrašą</a>
                    <form action="/logout" method="POST">
                        @csrf
                        <button class="hover:text-laravel"><i class="fa-solid fa-sign-out-alt"></i> Atsijungti</button>
                    </form>
        
            
                @else
                <li>
                    <a href="/register" class="hover:text-laravel"
                        ><i class="fa-solid fa-user-plus"></i> Registracija</a
                    >
                </li>
                <li>
                    <a href="/login" class="hover:text-laravel"
                        ><i class="fa-solid fa-arrow-right-to-bracket"></i>
                        Prisijungimas</a
                    >
                </li>
                @endauth
                
            </ul>
        </nav>