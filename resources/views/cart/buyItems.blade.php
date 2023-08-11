@extends('components.app')
@section('homeContent')
    <form action="{{ route('buyItems') }}" method="POST">
        @csrf
        <div class="bg-white border rounded-lg shadow-lg px-6 py-8 max-w-md mx-auto mt-8">
            <h1 class="font-bold text-2xl my-4 text-center text-blue-600">TecnoShop</h1>
            <hr class="mb-2">
            <div class="flex justify-between mb-6">
                <h1 class="text-lg font-bold">Compra</h1>
                <div class="text-gray-700">
                    <div>
                        Date:{{ (new DateTime(now()->toDateTimeString()))->format('Y-m-d') }}
                    </div>
                </div>
            </div>
            <div class="mb-8">
                <h2 class="text-lg font-bold mb-4">Cobrar a:</h2>
                <div class="text-gray-700 mb-2">
                    {{ Auth::user()->name }}
                </div>
                <div class="text-gray-700 mb-2">
                    {{ Auth::user()->email }}
                </div>
            </div>
            <table class="w-full mb-8">
                <thead>
                    <tr>
                        <th class="text-left font-bold text-gray-700">Descripción</th>
                        <th class="text-left font-bold text-gray-700">Cantidad</th>
                        <th class="text-right font-bold text-gray-700">Precio</th>
                    </tr>
                </thead>
                @foreach (session()->get('cart') as $productid => $product)
                    <tbody class="text-left text-gray-600">
                        <tr>
                            <td class="mb-4 text-xs font-extrabold tracking-wider">
                                <div class="flex items-start">
                                    <h2 tabindex="0" class="focus:outline-none text-xs font-semibold">
                                        {{ $product['name'] }}
                                    </h2>
                                </div>
                            </td>
                            <td class="mb-4 text-xs font-extrabold tracking-wider">
                                <div class="flex items-start">
                                    <h2 tabindex="0" class="focus:outline-none text-xs font-semibold">
                                        {{ $product['cantidad'] }}
                                    </h2>
                                </div>
                            </td>
                            <td class="text-right mb-4 text-xs font-extrabold tracking-wider ">
                                <h3 type="text" tabindex="0" class="focus:outline-none text-xs font-semibold" name=""> 
                                    ${{ $product['price'] }}
                                </h3>
                            </td>
                        </tr>
                    </tbody>
                @endforeach
                <tfoot class="border-t">
                    <tr class="columns-3">
                        <td class="text-left font-bold text-gray-700">Total</td>
                        <td class="text-left font-bold text-gray-700"></td>
                        <td class="text-right font-bold text-gray-700">
                            $<input type="text" name="totalPrice" value="{{ $totalPrice }}" class="w-16" disabled>
                        </td>
                        
                    </tr>
                </tfoot>
            </table>
            <div class="text-gray-700 mb-2">Thank you for your business!</div>
            <div class="text-gray-700 text-sm">Puede reembolsar su pago hasta 30 días.</div>
            <div>
                <input type="submit" value="Comprar" class="border bg-red-600 text-white p-2 inline-block mt-2 hover:cursor-pointer">
            </div>
        </div> 
    </form>
@endsection
