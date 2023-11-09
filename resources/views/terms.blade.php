@section('title', 'Terms of Services')

<x-guest-layout>
    <div class="h-auto bg-gradient-to-bl from-[#13a89e] to-white-700 dark:text-black">
        <nav>
            <div class="flex px-10 py-5 mx-auto ">
                <div class="flex flex-row items-center justify-center grow-0 w-52">
                    <a href="{{ url('/')}}"><img src="{{asset('assets/img/Logo_MyCuan.png')}}" alt="Logo MyCuan"
                                                 class="w-20 h-20"></a>
                    <a href="{{ url('/')}}">
                        <p class="ml-6 text-2xl text-black font-poppins">MyCuan</p>
                    </a>
                </div>
                <div class="flex items-center justify-center grow font-poppins">
                    <a href="/#persyaratan" class="mx-5 hover:text-white">Persyaratan Peminjaman</a>
                    <a href="/#tentang" class="mx-5 hover:text-white">Tentang Kami</a>
                    <a href="#kontak" class="mx-5 hover:text-white">Kontak</a>
                </div>
                @if (Route::has('login'))
                    <div class="flex items-center justify-center ml-96 relative">
                        @auth
                            @php
                                $dashboardRoute = match(auth()->user()->role_id) {
                                    1 => '/lender',
                                    2 => '/borrower',
                                    3 => '/admin',
                                };
                            @endphp

                            <a href="{{ url($dashboardRoute) }}" class="block w-48">
                                <button id="dashboardBtn"
                                        class="font-['Poppins'] inline-block rounded bg-[#186f65] px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] w-full">
                                    Dashboard
                                </button>
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="block w-48">
                                <button id="dashboardBtn"
                                        class="font-['Poppins'] inline-block rounded bg-[#186f65] px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] w-full">
                                    MASUK
                                </button>
                            </a>
                        @endauth
                    </div>
                @endif
            </div>
        </nav>
        <div class="min-h-screen flex flex-col items-center pt-6 sm:pt-0">

            <div class="w-full sm:max-w-2xl mt-6 p-6 bg-white text-black shadow-md overflow-hidden sm:rounded-lg prose">
                {!! $terms !!}
            </div>
        </div>
    </div>
</x-guest-layout>
