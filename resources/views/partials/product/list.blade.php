<div tabindex="0" class="focus:outline-none">
    <div>
        <div class="inline-block">
            @include('partials.product.title')
        </div>
        <div class="inline-block align-top float-right w-6/12">
            @include('partials.search')
        </div>
    </div>
    @include('partials.Messages.addToCar')
    <div class="mx-auto container py-8">
        <div class="flex flex-wrap items-center lg:justify-between justify-center">
            <table class="table-fixed w-full">
                <thead class="text-left">
                    <tr>
                        <th class="w-1/5 text-sm font-extrabold tracking-wide"></th>
                        <th class="w-1/5 text-sm font-extrabold tracking-wide"></th>
                        <th class="w-1/5 text-sm font-extrabold tracking-wide"></th>
                        <th class="w-1/5 text-sm font-extrabold tracking-wide"></th>
                        <th class="w-1/5 text-sm font-extrabold tracking-wide"></th>
                    </tr>
                </thead>
                @forelse ($products as $product)
                    <tbody class="text-left text-gray-600">
                        <tr>
                            <th class="mb-4 text-xs font-extrabold tracking-wider w-full">
                                <img alt="productImage"
                                    src="{{ asset('storage/ProductImages/' . $product->getProductImage()) }}" tabindex="0"
                                    class="focus:outline-none" width="1000" height="616" />
                            </th>
                            <th class="w-1/4 mb-4 text-xs font-extrabold tracking-wider">
                                <div class="flex items-start">
                                    <h2 tabindex="0"
                                        class="focus:outline-none text-lg font-semibold">
                                        {{ $product->getName() }}
                                    </h2>
                                </div>
                            </th>
                            <th class="w-1/4 mb-4 text-xs font-extrabold tracking-wider text-right">
                                <div class="flex items-start py-4">
                                    <h3 tabindex="0" class="focus:outline-none text-xl font-semibold">
                                        ${{ $product->getUnitPrice() }}
                                    </h3>
                                </div>
                            </th>
                            <th class="w-1/4 mb-4 text-xs font-extrabold tracking-wider text-right">
                                <div class="w-1/2">
                                    <form action="{{ route('product.show', $product->getId()) }}" method="GET">
                                        <input type="submit" value="Mostrar Detalles"
                                            class="border py-2 px-1 hover:cursor-pointer hover:bg-blue-500 hover:text-white">
                                    </form>
                                </div>
                            </th>
                            <th class="w-1/4 mb-4 text-xs font-extrabold tracking-wider text-right">
                                <div class="w-1/2">
                                    @include('partials.cart.addToCar')
                                </div>
                            </th>
                        </tr>
                    </tbody>
                @empty
                    @include('partials.listaVacia')
                @endforelse
            </table>
        </div>
        {{-- <div class="flex items-start justify-between mt-2 p-4">
            {{ $products->links() }}
        </div> --}}
    </div>
</div>
