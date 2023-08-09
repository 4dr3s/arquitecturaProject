@foreach (session()->get('cart') as $productid => $product)
    <div class="md:flex items-start py-6 2xl:px-10 md:px-6 px-4 border-b-8">
        <div class="xl:w-1/4 lg:w-1/5 w-60 md:block hidden">
            <img class="w-60" alt="productImage" src="{{ asset('storage/ProductImages/' . $product['file']) }}" />
        </div>
        <div class="md:hidden">
        </div>
        <div class="xl:w-2/5 md:w-1/2 lg:ml-8 md:ml-6 md:mt-0 mt-6">
            <div>
                <label class="text-red-600 font-bold text-5xl"> {{ $price }} </label>
            </div>
            <div class="mt-6">
                <label class="text-red-600 font-bold text-2xl"> ${{ $count }} </label>
            </div>
            <div class="p-2">
                <div class="inline-block">
                    @include('partials.cart.dicrement')
                </div>
                <div class="bg-red-600 border p-1 w-5 text-white text-center inline-block">
                    <label class="">{{ $product['cantidad'] }}</label>
                </div>
                <div class="inline-block">
                    @include('partials.cart.increment')
                </div>
            </div>
            <div class="flex justify-center mt-6">
                <div>
                    <form action="{{ route('removeFromCar', $productid) }}" method="POST">
                        @csrf
                        <input type="submit" value="Quitar del carrito"
                            class="p-2 border rounded-sm border-white bg-red-600 text-white hover:cursor-pointer">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach
