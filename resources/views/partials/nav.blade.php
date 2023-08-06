<div class="px-3 py-3 lg:px-5 lg:pl-3">
    @auth
        <div class="inline-block relative float-right mt-3 mb-3">
            <div class="inline-block">
                @if (Auth::guard('isAdmin'))
                    <form action="{{ route('showDetail') }}" method="GET">
                        <input
                        class="mr-5 text-sm px-4 py-2 leading-none border rounded text-white border-white hover:border-transparent hover:text-teal-500 hover:bg-white mt-4 lg:mt-0 hover:cursor-pointer"
                        type="submit" value="User">
                    </form>
                @endif
            </div>
            <div class="inline-block align-top">
                <form action="{{ url('/logout') }}" method="POST">
                    @csrf
                    <input
                        class="text-sm px-4 py-2 leading-none border rounded text-white border-white hover:border-transparent hover:text-teal-500 hover:bg-white mt-4 lg:mt-0 hover:cursor-pointer"
                        type="submit" value="Log Out">
                </form>
            </div>
        </div>
    @endauth
    <div class="flex items-center justify-between">
        <div class="flex items-center justify-start">
            <span class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap dark:text-white">
                <a href=" {{ url('/home') }} ">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                        class="w-6 h-6 inline-block">
                        <path
                            d="M3.375 4.5C2.339 4.5 1.5 5.34 1.5 6.375V13.5h12V6.375c0-1.036-.84-1.875-1.875-1.875h-8.25zM13.5 15h-12v2.625c0 1.035.84 1.875 1.875 1.875h.375a3 3 0 116 0h3a.75.75 0 00.75-.75V15z" />
                        <path
                            d="M8.25 19.5a1.5 1.5 0 10-3 0 1.5 1.5 0 003 0zM15.75 6.75a.75.75 0 00-.75.75v11.25c0 .087.015.17.042.248a3 3 0 015.958.464c.853-.175 1.522-.935 1.464-1.883a18.659 18.659 0 00-3.732-10.104 1.837 1.837 0 00-1.47-.725H15.75z" />
                        <path d="M19.5 19.5a1.5 1.5 0 10-3 0 1.5 1.5 0 003 0z" />
                    </svg>
                    TecnoShop
                </a>
            </span>
        </div>
    </div>
</div>
