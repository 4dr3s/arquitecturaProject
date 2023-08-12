@extends('components.app')
@section('homeContent')
    @foreach ($billUser as $bill)
        @if ($bill->getUser_id() == $id)
            <table class="table-fixed w-full">
                <thead class="text-left">
                    <tr class="bg-blue-700 text-white">
                        <th class="w-1/3 text-sm font-extrabold tracking-wide border border-white">
                            <h3 class="p-2">
                                Date
                            </h3>
                        </th>
                        <th class="w-1/3 text-sm font-extrabold tracking-wide border border-white">
                            <h3 class="p-2">
                                Productos
                            </h3>
                        </th>
                        <th class="w-1/3 text-sm font-extrabold tracking-wide border border-white text-right">
                            <h3 class="p-2 inline-block">
                                Importe
                            </h3>
                        </th>
                    </tr>
                </thead>
                <tbody class="text-left text-gray-600">
                    <th class="w-1/3 text-sm font-extrabold tracking-wide border border-white">
                        {{ $bill->getDateOrder() }}
                    </th>
                    <th class="w-1/3 mb-4 text-xs font-extrabold tracking-wider">
                        <table>
                            <thead class="text-left">
                                <tr class="bg-blue-700 text-white">
                                    <th class="w-1/2 text-sm font-extrabold tracking-wide border border-white">
                                        <h3 class="p-2">
                                            Nombre Producto
                                        </h3>
                                    </th>
                                    <th class="w-1/2 text-sm font-extrabold tracking-wide border border-white">
                                        <h3 class="p-2">
                                            Cantidad
                                        </h3>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <th>
                                    @foreach ($bill->getProduct_id() as $product)
                                        @foreach ($product as $prod)
                                            <h3 class="p-2">
                                                {{ $prod }}
                                            </h3>
                                        @endforeach
                                    @endforeach
                                </th>
                                <th>
                                    @foreach ($bill->getAmount() as $amount)
                                        @foreach ($amount as $count)
                                            <div class="flex items-start">
                                                <h2 tabindex="0" class="focus:outline-none text-lg font-semibold">
                                                    {{ $count }}
                                                </h2>
                                            </div>
                                        @endforeach
                                    @endforeach
                                </th>
                            </tbody>
                        </table>
                    </th>
                    <th class="w-1/3 text-sm font-extrabold tracking-wide text-right">
                        <h3>
                            ${{ $bill->getTotalPrice() }}
                        </h3>
                    </th>
                </tbody>
            </table>
        @endif
    @endforeach
    <a href="{{ url('/listUsers') }}" type="button" class="border p-2 bg-red-600 text-white">Volver</a>
@endsection
