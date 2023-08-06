<div class="flex justify-center mr-4">
    <button class="text-gray-700 border inline-block w-8 hover:bg-red-600 hover:text-white"
        wire:click="decrement">-</button>
    <div class="text-gray-700 border w-8 grid h-full place-items-center hover:cursor-default"> {{ $data }} </div>
    <button class="text-gray-700 border inline-block w-8 hover:bg-red-600 hover:text-white"
        wire:click="increment">+</button>
</div>
