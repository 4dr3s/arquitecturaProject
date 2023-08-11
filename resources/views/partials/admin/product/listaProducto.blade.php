<div>
    <div class="columns-2">

    </div>
    <table class="table-fixed w-full">
        <thead class="text-left">
            <tr>
                <th class="w-1/2 pb-10 text-sm font-extrabold tracking-wide">Producto</th>
                <th class="w-1/4 pb-10 text-sm font-extrabold tracking-wide text-right">Categoria</th>
                <th class="w-1/4 pb-10 text-sm font-extrabold tracking-wide text-right">Stock</th>
                <th class="w-1/4 pb-10 text-sm font-extrabold tracking-wide text-right">Precio Unitario</th>
                <th class="w-1/4 pb-10 text-sm font-extrabold tracking-wide text-right">Status</th>
            </tr>
        </thead>
        <tbody class="text-left text-gray-600">
            @forelse ($products as $product)
                <tr class="border">
                    <th class="mb-4 text-xs font-extrabold tracking-wider flex flex-row items-center w-full">
                        <p class="name-1">{{ $product->name }}</p>
                    </th>
                    <th class="w-1/4 mb-4 text-xs font-extrabold tracking-wider text-right columns-2">
                        <div class="inline-block">
                            <img class="img-thumbnail"
                                src="{{ asset('storage/ProductImages/' . $product->productImage) }}" alt="ProducImage"
                                class="w-5">
                        </div>
                        <div>
                            @foreach ($product->Categories as $categorie)
                                {{ $categorie->name }}
                            @endforeach
                        </div>
                    </th>
                    <th class="w-1/4 mb-4 text-xs font-extrabold tracking-wider text-right">{{ $product->stock }}<span
                            class="num-4"></span>
                    </th>
                    <th class="w-1/4 mb-4 text-xs font-extrabold tracking-wider text-right"> ${{ $product->unitPrice }}
                        <span class="num-2"></span>
                    </th>
                    <th class="w-1/4 mb-4 text-xs font-extrabold tracking-wider text-right">
                        @if ($product->estado)
                            <label class="rounded-lg bg-green-500 text-white p-4">
                                En Stock
                            </label>
                        @else
                            <label class="rounded-lg bg-red-500 text-white p-4">
                                Agotado
                            </label>
                        @endif
                    </th>
                </tr>
            @empty
                @include('partials.product.listaVacia')
            @endforelse

        </tbody>
    </table>
</div>
