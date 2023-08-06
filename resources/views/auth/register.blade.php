<div class="grid h-screen place-items-center bg-slate-100">
    <form class="bg-white border border-gray-400 px-8 pt-6 pb-8 mb-4" method="POST" action="{{ route('registering') }}"
        enctype="multipart/form-data">
        @csrf
        <div class="grid place-items-center mb-8 font-semibold font-serif text-2xl">
            <h1 class="border-b border-t border-t-gray-900 border-b-gray-900">TecnoShop</h1>
        </div>
        <div class="grid place-items-center mb-8 font-semibold font-serif text-2xl">
            <h2 class="border-b border-t border-t-gray-900 border-b-gray-900">Register</h2>
        </div>
        <div class="mb-4 border-b border-teal-800 columns-2">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                Name
            </label>
            <input
                class="shadow appearance-none mb-2 border border-gray-400 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                type="text" name="name" placeholder="Client Name" value="{{ old('name' ?? '') }}" />
            <div class="mb-2">
                @if ($errors->has('name'))
                    @include('auth.errors.name')
                @endif
            </div>
        </div>
        <div class="mb-4 border-b border-teal-800 columns-2">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                Email
            </label>
            <input
                class="shadow appearance-none mb-2 border border-gray-400 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                type="email" name="email" placeholder="Email" value="{{ old('email' ?? '') }}" />
            <div class="mb-2">
                @if ($errors->has('email'))
                    @include('auth.errors.emailError')
                @endif
            </div>
        </div>
        <div class="mb-2 border-b border-teal-800 columns-2">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                Password
            </label>
            <input
                class="shadow appearance-none border border-gray-400 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                type="password" name="password" placeholder="********" />
            <div class="mb-2">
                @if ($errors->has('password'))
                    @include('auth.errors.passError')
                @endif
            </div>
        </div>
        <div class="mb-2 border-b border-teal-800 columns-2">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                Confirm Password
            </label>
            <input
                class="shadow appearance-none border border-gray-400 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                type="password" name="password_confirmation" placeholder="********" />
        </div>
        <div class="mb-2 border-b border-teal-800 columns-2">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                Profile Image
            </label>
            <input
                class="shadow appearance-none border border-gray-400 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                type="file" name="profileImage" />
            <div class="mb-2">
                @if ($errors->has('profileImage'))
                    @include('auth.errors.file')
                @endif
            </div>
        </div>
        @if (Auth::check() && Auth::guard('isAdmin'))
            <div class="mb-2 border-b border-teal-800">
                <div class="btn-group-toggle" data-toggle="buttons">
                    <label class="btn btn-primary">
                        <input type="checkbox" name="isAdmin"> Administrador
                    </label>
                </div>
            </div>
        @endif
        <div class="flex items-center justify-between columns-2">
            <input type="submit" value="Register"
                class="bg-blue-500 hover:bg-blue-700 hover:border-slate-400 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline
                hover:cursor-pointer">
            <div>
                <a class="inline-block mb-2 align-baseline font-bold text-sm text-blue-500 hover:text-blue-800"
                    href="{{ route('login') }}">
                    Ya tiene una cuenta? Inicie Sesión.
                </a>
            </div>
        </div>
    </form>
</div>
