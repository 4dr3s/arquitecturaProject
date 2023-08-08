<form action="{{ route('cartIncrement', $product['id']) }}" method="POST">
    @csrf
    <input type="submit" value="+" class="hover:cursor-pointer border w-8 bg-red-600 text-white">
</form>