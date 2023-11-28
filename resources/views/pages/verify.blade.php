<x-layout docTitle='Paskyros Patvirtinimas'>
<div class="flex justify-center items-center py-4">
    <div class="bg-white p-6 rounded-lg shadow-md">
        @if(auth()->user() && auth()->user()->hasVerifiedEmail())
            <h2 class="text-2xl font-bold mb-4">Jūsų El. Paštas Patvirtintas</h2>
            <p class="text-gray-600 mb-4">
                Dabar galite pilnai naudotis savo paskyra ir jos funkcijomis.
            </p>
        @else
            <h2 class="text-2xl font-bold mb-4">Registracijos Patvirtinimas</h2>
            <p class="text-gray-600 mb-4">
                <span class="text-green-500">Dėkojame už registraciją!</span> Patvirtinimo nuoroda buvo išsiųsta į <span class="underline">Jūsų nurodytą el. paštą</span>. Prašome patikrinti savo laiškų gaviklį ir paspausti ant patvirtinimo nuorodos, kad užbaigtumėte registracijos procesą.
            </p>
            <p class="text-gray-600">
                Jei negavote patvirtinimo laiško, patikrinkite savo el. pašto šlamšto aplanką (spam folder) arba 
                <a href="/resend/verification/email" class="text-red-500">spauskite čia</a>,
                kad vėl išsiųstumėte patvirtinimo nuorodą.
            </p>
        @endif
    </div>
</div>
</x-layout>