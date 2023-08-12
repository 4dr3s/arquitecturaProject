<div>
    <table class="table-fixed w-full">
        <thead class="text-left">
            <tr>
                <th class="w-1/2 pb-10 text-sm font-extrabold tracking-wide">Cliente</th>
                <th class="w-1/4 pb-10 text-sm font-extrabold tracking-wide text-right">Email</th>
                <th class="w-1/4 pb-10 text-sm font-extrabold tracking-wide text-right">Rol</th>
                <th class="w-1/4 pb-10 text-sm font-extrabold tracking-wide text-right">Compras</th>
                <th class="w-1/4 pb-10 text-sm font-extrabold tracking-wide text-right">Estado de la cuenta</th>
            </tr>
        </thead>
        <tbody class="text-left text-gray-600">
            @forelse ($users as $user)
                <tr class="border">
                    <th class="mb-4 text-xs font-extrabold tracking-wider flex flex-row items-center w-full">
                        <p class="name-1">{{ $user->getName() }}</p>
                    </th>
                    <th class="w-1/4 mb-4 text-xs font-extrabold tracking-wider text-right">{{ $user->getemail() }}<span
                            class="num-4"></span>
                    </th>
                    <th class="w-1/4 mb-4 text-xs font-extrabold tracking-wider text-right">
                        @if ($user->getIsAdmin())
                            Administrador
                        @else
                            Cliente
                        @endif
                        <span class="num-2"></span>
                    </th>
                    <th class="w-1/4 mb-4 text-xs font-extrabold tracking-wider text-right">
                        <form action="{{ route('showUserBill', $user->getId()) }}" method="POST">
                            @csrf
                            <input type="submit" value="Ver Compras" class="hover:cursor-pointer">
                        </form>
                    </th>
                    <th class="w-1/4 mb-4 text-xs font-extrabold tracking-wider text-right">
                        @if ($user->getEstado())
                            <label class="rounded-lg bg-green-500 text-white p-4">
                                Activa
                            </label>
                        @else
                            <label class="rounded-lg bg-red-500 text-white p-4">
                                No Activa
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
