<form action="/create-comment" method="POST" class="mb-8">
    @csrf
    <input type="hidden" name="post_id" value="{{ $post->id }}"/>
    <textarea name="body" rows="4" class="w-full border rounded-md p-2 mb-2" placeholder="Rašykite komentarą">{{@old('body')}}</textarea>
    <button type="submit" class="bg-laravel text-white font-semibold uppercase text-sm md:text-base px-4 py-2 rounded-sm hover:bg-black">Atsakyti</button>
</form>