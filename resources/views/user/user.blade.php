@extends('components.app')
@section('homeContent')
    <div class="border inline-block p-3 mr-2">
        <img src="{{ asset('storage/Userimages/' . $user->profileImage) }}" alt="profileImage" width="400px" />
    </div>
    <div class="p-3 inline-block align-top font-serif text-3xl">
        <div class="mb-4">
            <h3 class="font-bold">Nombre: </h3>
            {{ $user->name }}
        </div>
        <div class="mb-4">
            <h3 class="font-bold">Correo: </h3>
            {{ $user->email }}
        </div>
        <div class="mb-4">
            <h3 class="font-bold">Estado de la cuenta: </h3>
            @if ($user->estado)
                <p class="inline-block border rounded-lg pl-2 pr-2 bg-green-400 text-white">
                    Activa
                </p>
            @else
                <p class="inline-block mt-2 border rounded-lg pl-2 pr-2 bg-red-400 text-white">
                    No activa
                </p>
            @endif
        </div>
    </div>
@endsection
