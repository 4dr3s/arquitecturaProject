<div class="flex justify-center mt-6">
    <form action=" {{ url('/cart/buy') }} " method="POST">
        @csrf
        <input type="submit" value="Realizar compra"
            class="p-2 border rounded-sm border-white bg-red-600 text-white hover:cursor-pointer">
    </form>
</div>
