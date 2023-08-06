<div class="grid h-screen place-items-center bg-slate-100">
    <form class="bg-white border border-gray-400 px-8 pt-6 pb-8 mb-4" method="POST" action="{{ route('authenticate') }}">
        @csrf
        <div class="grid place-items-center mb-8 font-semibold font-serif text-2xl">
            <h1 class="border-b border-t border-t-gray-900 border-b-gray-900">TecnoShop</h1>
        </div>
        <div class="mb-4 border-b border-teal-800 columns-2">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                Email
            </label>
            <input
                class="shadow appearance-none mb-2 border border-gray-400 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                type="email" name="email" placeholder="Email" value="{{ old('email' ?? '') }}" />
        </div>
        <div class="mb-2">
            @if ($errors->has('email'))
                @include('auth.errors.emailError')
            @endif
        </div>
        <div class="mb-2 border-b border-teal-800 columns-2">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                Password
            </label>
            <input
                class="shadow appearance-none border border-gray-400 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                type="password" name="password" placeholder="********" value="{{ old('password' ?? '') }}" />
        </div>
        <div class="mb-2">
            @if ($errors->has('password'))
                @include('auth.errors.passError')
            @endif
        </div>
        <div class="mb-6 columns-2">
            <div class="btn-group-toggle" data-toggle="buttons">
                <label class="btn btn-primary">
                    <input type="checkbox" name="remember"> Recuerdame
                </label>
            </div>
            <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="{{ route('register') }}">
                No tiene una cuenta? Registrese.
            </a>
        </div>
        <div class="flex items-center justify-between">
            <input type="submit" value="Sign In"
                class="bg-blue-500 hover:bg-blue-700 hover:border-slate-400 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline
                hover:cursor-pointer">
            @if ($errors->has('login'))
                @include('auth.errors.credentials')
            @endif
        </div>
    </form>
</div>
