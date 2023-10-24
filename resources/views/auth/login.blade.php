@section('title', 'Login')

<x-guest-layout>
    <!-- Session Status -->
    @if (session('status'))
    <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
        {{ session('status') }}
    </div>
    @endif

    <div class="flex flex-wrap max-h-full">
        <div class="w-1/2 h-screen">
            <div class="flex flex-wrap items-center h-40 ">
                <img src="{{asset('assets/img/Logo_MyCuan.png')}}" alt="Logo MyCuan" class="w-20 h-20 ml-28">
                <p class="text-[#868686] ml-8 mt-4 font-semibold font-poppins text-2xl">MyCuan</p>
            </div>
            <div>
                <img class="w-3/4 h-3/4 ml-16" src="{{asset('assets/img/MyCuan_Image.png')}}" alt="Desain MyCuan">
            </div>
        </div>
        <div class="w-1/2 bg-[#13A89E] max-h-full ">
            <div class="flex flex-col w-3/4 h-3/4 mx-auto mt-2 content-center">
                <div class="w-8/12 mx-auto">
                    <h1 class="text-white mt-28 font-bold font-poppins text-3xl">Selamat Datang</h1>
                </div>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="w-8/12 mt-16 mx-auto">
                        <x-input-label class="text-white text-xl font-poppins dark:text-white" for="email"
                            value="{{ __('Email')}}" />
                        <div
                            class="flex flex-row items-center w-full bg-white rounded-md hover:border-indigo-500 border-transparent border-2 mt-2">
                            <x-input name="email" type="email" id="email"
                                class="w-full py-2.5 ml-3 px-0 border-transparent focus:border-transparent focus:ring-0 dark:bg-white dark:border-transparent dark:focus:ring-0 dark:focus:border-transparent"
                                placeholder="{{ __('Silakan masukan alamat email Anda') }}" required
                                autocomplete="username" :value="old('email')" />
                            <x-input-error for="email" class="mt-2" />
                        </div>
                    </div>
                    <div class="w-8/12 mt-12 mx-auto">
                        <x-input-label class="text-white text-xl font-poppins dark:text-white" for="password"
                            value="{{ __('Kata Sandi')}}" />
                        <div
                            class="flex flex-row items-center w-full bg-white rounded-md hover:border-indigo-500 border-transparent border-2 mt-2">
                            <x-input name="password" type="password" id="password"
                                class="w-full py-2.5 ml-3 px-0 border-transparent focus:border-transparent focus:ring-0 dark:bg-white dark:border-transparent dark:focus:ring-0 dark:focus:border-transparent"
                                placeholder="{{ __('Silakan masukan kata sandi Anda') }}" required
                                autocomplete="current-password" />
                            <img class="w-6 h-6 mr-2" src="{{asset('assets/img/eye-hidden.png')}}" alt="Hidden Password"
                                id="eye-hidden" onclick="show()">
                            <img class="w-6 h-6 mr-2 hidden" src="{{asset('assets/img/eye-show.png')}}"
                                alt="Show Password" id="eye-show" onclick="show()">
                        </div>
                        <x-input-error for="password" class="mt-2" />
                    </div>
                    <div class="flex flex-wrap w-8/12 mt-6 mx-auto">
                        <div class="w-1/2 content-center">
                            <x-label class="block" for="remember">
                                <span class="text-white text-xl font-poppins">{{ __('Ingat Saya') }}</span>
                                <x-input
                                    class="rounded-md mb-1 dark:bg-white dark:border-transparent dark:focus:ring-0 dark:focus:border-transparent dark:text-blue-600"
                                    type="checkbox" id="remember" name="remember" />
                            </x-label>
                        </div>
                        <div class="w-1/2">
                            @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}"
                                class="float-right text-white text-xl font-poppins">{{ __('Lupa Kata Sandi?') }}
                            </a>
                            @endif
                        </div>
                    </div>
                    <div class="flex flex-col w-8/12 mt-6 mx-auto justify-center">
                        <button
                            class="w-full mt-3 h-10 bg-[#186F65] text-white font-bold text-base font-worksans justify-center rounded-md hover:bg-white hover:text-[#186F65]">
                            {{ __('MASUK') }}
                        </button>
                    </div>
                </form>
                <div class="flex flex-col w-8/12 mt-6 mx-auto justify-center">

                    <button
                        class="w-full h-10 bg-white text-[#186F65] font-bold text-base font-worksans justify-center rounded-md hover:bg-[#186F65] hover:text-white"
                        onclick="window.location='{{ route('register-role') }}'">
                        {{ __('DAFTAR') }}
                    </button>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
