<div class="max-w-7xl mx-auto bg-white rounded-lg shadow-md p-6 mt-6">
    <h2 class="text-2xl font-bold mb-4">Komentarai</h2>
    <form action="/post/comment" method="POST" class="mb-8">
        @csrf
        <textarea name="comment" rows="4" class="w-full border rounded-md p-2 mb-2" placeholder="Rašykite komentarą"></textarea>
        <button type="submit" class="bg-laravel text-white font-semibold uppercase text-sm md:text-base px-4 py-2 rounded-sm hover:bg-black">Atsakyti</button>
    </form>
    <!-- Komentarų atvaizdavimas -->
    <div class="border-t pt-4">
</div>
</div>