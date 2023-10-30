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

        <!-- Body here -->
        <div class="w-1/2 bg-[#13A89E] max-h-full grid justify-items-center">
            <div class="flex flex-col w-3/5 mx-auto mt-2 justify-center">

                <!-- judul -->
                <div class="flex mx-auto">
                    <h1 class="text-white font-bold font-poppins text-3xl text-center ">Lupa Kata Sandi</h1>
                </div>

                <!-- deskripsi -->
                <div class="flex mx-auto text-sm text-white text-center mt-4 text-[16px]">
                    {{ __('Masukan alamat email yang telah terdaftar untuk menerima email reset kata sandi') }}
                </div>

                <!-- router -->
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <!-- form email -->
                    <div class="w-3/4 mt-10 mx-auto">
                        <x-input-label class="text-white text-xl font-poppins dark:text-white" for="email" value="{{ __('Email')}}" />
                        <div class="flex flex-row items-center w-full bg-white rounded-md hover:border-sky-600 border-transparent border-2 mt-2 ">
                            <x-input name="email" type="email" id="email" class="w-full py-2.5 ml-3 px-0 border-transparent focus:border-transparent focus:ring-0 dark:bg-white dark:border-transparent dark:focus:ring-0 dark:focus:border-transparent" placeholder="{{ __('Silakan masukan alamat email Anda') }}" required autocomplete="username" :value="old('email')" />
                        </div>
                        <!-- alert email -->
                        <x-input-error :messages="$errors->get('email')" class="mb-4 font-medium text-sm text-white dark:text-white justify-center text-center mt-5 bg-red-600 border-red-800 px-4 py-3 rounded relative" />

                        <!-- Session Status alerrt-->
                        @if (session('status'))
                        <div class="mb-4 font-medium text-sm text-white dark:text-white justify-center text-center mt-5 bg-green-600 border-green-800 px-4 py-3 rounded relative">
                            {{ session('status') }}
                        </div>
                        @endif
                    </div>


                    <!-- button kirim -->
                    <div class="flex flex-col w-3/4 mt-6 mx-auto justify-center">
                        <button class="justify-center dark:text-black text-black dark:bg-white bg-white py-3 rounded-md hover:bg-gray-200 font-poppins text-bold text-relative">
                            {{ __('Kirim') }}
                        </button>
                    </div>

                </form>
</x-guest-layout>