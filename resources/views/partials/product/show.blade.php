<div class="md:flex items-start justify-center py-12 2xl:px-20 md:px-6 px-4">
    <div class="xl:w-2/6 lg:w-2/5 w-80 md:block hidden">
        <img class="w-full" alt="productImage"
            src="{{ asset('storage/ProductImages/' . $product->productImage) }}" />
    </div>
    <div class="md:hidden">
    </div>
    <div class="xl:w-2/5 md:w-1/2 lg:ml-8 md:ml-6 md:mt-0 mt-6">
        <div>
            <label class="text-red-600 font-bold text-5xl"> {{ $product->name }} </label>
        </div>
        <div>
            <p class="xl:pr-48 lg:leading-tight leading-normal text-black mt-7">
                {{ $product->description }}
            </p>
        </div>
        <div class="mt-6">
            <label class="text-red-600 font-bold text-2xl"> ${{ $product->unitPrice }} </label>
        </div>
        <div class="flex justify-center mt-6">
            @livewire('counter-plus')
            @include('partials.cart.addToCar')
        </div>
    </div>
</div>
