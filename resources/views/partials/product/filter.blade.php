<div class="rounded bg-blue-500 text-white p-4">
    @foreach ($categories as $category)
        <h3 class="inline-block">
            <input type="checkbox" name="id[]" value="{{ $category->getId() }}" class="hover:cursor-pointer">
            {{ $category->getName() }}
        </h3>
    @endforeach
    <input type="submit" value="Filtrar" class="bg-green-500 text-white text-center rounded p-2 hover:cursor-pointer">
</div>
