<x-guest-layout>
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
            <div class="flex flex-col w-3/5 mx-auto mt-2 justify-center">

                <!-- judul -->
                <div class="flex mx-auto">
                    <h1 class="text-white mt-28 font-bold font-poppins text-3xl text-center ">Lupa Kata Sandi</h1>
                </div>

                <!-- deskripsi -->
                <div class="flex mb-4 text-sm text-white text-center mt-4 text-[16px]">
                    {{ __('Masukan alamat email yang telah terdaftar untuk menerima email reset kata sandi') }}
                </div>

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <!-- form email -->
                    <div class="w-3/4 mt-10 mx-auto">
                        <x-input-label class="text-white text-xl font-poppins dark:text-white" for="email" value="{{ __('Email')}}" />
                        <div class="flex flex-row items-center w-full bg-white rounded-md hover:border-indigo-500 border-transparent border-2 mt-2">
                            <x-input name="email" type="email" id="email" class="w-full py-2.5 ml-3 px-0 border-transparent focus:border-transparent focus:ring-0 dark:bg-white dark:border-transparent dark:focus:ring-0 dark:focus:border-transparent" placeholder="{{ __('Silakan masukan alamat email Anda') }}" required autocomplete="username" :value="old('email')" />
                        </div>
                        <!-- alert email -->
                        <x-input-error :messages="$errors->get('email')" class="mt-2 bg-white" />
                    </div>

                    <!-- button kirim -->
                    <div class="flex flex-col w-3/4 mt-6 mx-auto justify-center">
                        <x-button class="justify-center">
                            {{ __('Kirim') }}
                        </x-button>
                    </div>

                    <!-- Session Status alert-->
                    @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400 justify-center text-center mt-5">
                        {{ session('status') }}
                    </div>
                    @endif

                </form>
</x-guest-layout>