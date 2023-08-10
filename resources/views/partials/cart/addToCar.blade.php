<form action="{{ route('AddToCar', $product->getId()) }}" method="POST">
    @csrf
    <input type="submit" value="Añadir al Carrito"
        class="py-2 px-1 border rounded-sm border-white bg-red-600 text-white hover:cursor-pointer">
</form>