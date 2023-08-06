<div tabindex="0" class="focus:outline-none">
    <div>
        <div class="inline-block">
            @include('partials.product.title')
        </div>
        <div class="inline-block align-top float-right w-6/12">
            @include('partials.search')
        </div>
    </div>
    @if (session('success'))
        <div class="flex items-center p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800"
            role="alert">
            <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="currentColor" viewBox="0 0 20 20">
                <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <span class="sr-only">Info</span>
            <div>
                <span class="font-medium">{{ session('success') }}</span>
            </div>
        </div>
    @endif
    <div class="mx-auto container py-8">
        <div class="flex flex-wrap items-center lg:justify-between justify-center">
            @forelse ($products as $product)
                <div tabindex="0" class="focus:outline-none mx-2 w-72 xl:mb-0 mb-8 border mt-4">
                    <div>
                        <img alt="productImage" src="{{ asset('storage/productsImages/' . $product->productImage) }}"
                            tabindex="0" class="focus:outline-none w-full h-44" />
                    </div>
                    <div class="bg-white dark:bg-gray-800">
                        <div class="p-4">
                            <div class="flex items-center">
                                <h2 tabindex="0"
                                    class="border-b focus:outline-none text-lg dark:text-white font-semibold">
                                    {{ $product->name }}
                                </h2>
                            </div>
                            <p tabindex="0" class="focus:outline-none text-xs text-gray-600 dark:text-gray-200 mt-2">
                                {{ $product->description }}
                            </p>
                            <div class="flex items-center justify-between py-4">
                                <h3 tabindex="0" class="focus:outline-none text-white text-xl font-semibold">
                                    ${{ $product->unitPrice }}
                                </h3>
                            </div>
                            <div class="columns-2">
                                <div class="w-1/2">
                                    <form action="{{ route('product.show', $product) }}" method="GET">
                                        @csrf
                                        <input type="submit" value="Mostrar Detalles"
                                            class="border border-white py-2 px-1 text-white hover:cursor-pointer hover:bg-white hover:text-green-700">
                                    </form>
                                </div>
                                <div class="w-1/2">
                                    <form action="{{ route('AddToCar', $product->id) }}" method="POST">
                                        @csrf
                                        <input type="submit" value="Añadir al Carrito"
                                            class="py-2 px-1 border rounded-sm border-white bg-red-600 text-white hover:cursor-pointer">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                @include('partials.listaVacia')
            @endforelse
        </div>
    </div>
</div>
