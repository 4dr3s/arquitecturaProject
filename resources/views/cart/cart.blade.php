@extends('components.app')
@section('homeContent')
    @if (session('success'))
        <div class="flex items-center p-4 mb-4 text-sm text-blue-800 border border-blue-300 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400 dark:border-blue-800"
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
    @if (session()->get('cart'))
        @foreach (session()->get('cart') as $productid => $product)
            <div class="md:flex items-start py-6 2xl:px-10 md:px-6 px-4 border-b-8">
                <div class="xl:w-1/4 lg:w-1/5 w-60 md:block hidden">
                    <img class="w-60" alt="productImage"
                        src="{{ asset('storage/ProductImages/' . $product['file']) }}" />
                </div>
                <div class="md:hidden">
                </div>
                <div class="xl:w-2/5 md:w-1/2 lg:ml-8 md:ml-6 md:mt-0 mt-6">
                    <div>
                        <label class="text-red-600 font-bold text-5xl"> {{ $product['name'] }} </label>
                    </div>
                    <div class="mt-6">
                        <label class="text-red-600 font-bold text-2xl"> ${{ $product['price'] }} </label>
                    </div>
                    <div class="flex justify-center mt-6">
                        @livewire('counter-plus')
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
        @include('partials.cart.buy')
    @else
        <div class="flex items-center p-4 mb-4 text-sm text-yellow-800 border border-yellow-300 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300 dark:border-yellow-800"
            role="alert">
            <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="currentColor" viewBox="0 0 20 20">
                <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <span class="sr-only text-yellow-500">Info</span>
            <div>
                <span class="font-medium">No existen Productos en el carrito</span>
            </div>
        </div>
    @endif
@endsection
