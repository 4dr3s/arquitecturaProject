<div>
    <div class="mb-4">
        <form method="GET" action="{{ route('searchAdminProduct') }}">
            @include('partials.search')
        </form>
    </div>
    <table class="table-fixed w-full">
        <thead class="text-left">
            <tr>
                <th class="w-1/2 pb-10 text-sm font-extrabold tracking-wide">Producto</th>
                <th class="w-1/4 pb-10 text-sm font-extrabold tracking-wide text-right">Categoria</th>
                <th class="w-1/4 pb-10 text-sm font-extrabold tracking-wide text-right">Stock</th>
                <th class="w-1/4 pb-10 text-sm font-extrabold tracking-wide text-right">Precio Unitario</th>
                <th class="w-1/4 pb-10 text-sm font-extrabold tracking-wide text-right">Status</th>
                <th class="w-1/4 pb-10 text-sm font-extrabold tracking-wide text-right"></th>
                <th class="w-1/4 pb-10 text-sm font-extrabold tracking-wide text-right"></th>
                <th class="w-1/4 pb-10 text-sm font-extrabold tracking-wide text-right"></th>
            </tr>
        </thead>
        <tbody class="text-left text-gray-600">
            @forelse ($products as $product)
                <tr class="border">
                    <th class="mb-4 text-xs font-extrabold tracking-wider flex flex-row items-center w-full">
                        <p class="name-1">{{ $product->getName() }}</p>
                    </th>
                    <th class="w-1/4 mb-4 text-xs font-extrabold tracking-wider text-right columns-2">
                        <div class="inline-block">
                            <img class="img-thumbnail"
                                src="{{ asset('storage/ProductImages/' . $product->getProductImage()) }}"
                                alt="ProducImage" class="w-5">
                        </div>
                        <div>
                            <p class="name-1">{{ $product->getCategory() }}</p>
                        </div>
                    </th>
                    <th class="w-1/4 mb-4 text-xs font-extrabold tracking-wider text-right">
                        <span class="num-4">{{ $product->getStock() }}</span>
                    </th>
                    <th class="w-1/4 mb-4 text-xs font-extrabold tracking-wider text-right">
                        <span class="num-2">${{ $product->getUnitPrice() }}</span>
                    </th>
                    <th class="w-1/4 mb-4 text-xs font-extrabold tracking-wider text-right">
                        @if ($product->getEstado())
                            <label class="rounded-lg bg-green-500 text-white p-4">
                                En Stock
                            </label>
                        @else
                            <label class="rounded-lg bg-red-500 text-white p-4">
                                Agotado
                            </label>
                        @endif
                    </th>
                    <th class="w-1/4 mb-4 text-xs font-extrabold tracking-wider text-center">
                        <form action="{{ route('modifyProductActivate', $product->getId() ) }}" method="GET">
                            <input type="submit" value="Activar" class="rounded-lg bg-blue-700 text-white p-2 hover:cursor-pointer">
                        </form>
                    </th>
                    <th class="w-1/4 mb-4 text-xs font-extrabold tracking-wider text-center">
                        <form action="{{ route('modifyProduct', $product->getId() ) }}" method="GET">
                            <input type="submit" value="Desactivar" class="bg-red-500 rounded-lg text-white p-2 hover:cursor-pointer">
                        </form>
                    </th>
                    <th class="w-1/4 mb-4 text-xs font-extrabold tracking-wider text-center">
                        <form action="{{ route('addProduct', $product->getId() ) }}" method="GET">
                            <input type="submit" value="+" class="bg-green-500 rounded-lg text-white p-2 hover:cursor-pointer">
                        </form>
                    </th>
                </tr>
            @empty
                @include('partials.product.listaVacia')
            @endforelse
        </tbody>
    </table>
</div>
<div class="flex items-start justify-between mt-2 p-4">
    {{ $productsList->links() }}
</div>
