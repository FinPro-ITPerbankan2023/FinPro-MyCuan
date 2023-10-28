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

        <div class="w-1/2 bg-[#13A89E] max-h-full">
            <div class="flex flex-col w-3/4 h-3/4 mx-auto mt-2 content-center">
                <div class="w-8/12 mx-auto text-center">
                    <h1 class="text-white mt-16 font-bold font-poppins text-3xl">Register</h1>
                </div>


        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <style>
                .letter-spacing-input {
                    letter-spacing: 2px; 
                }
            </style>

            <div class="mt-4">
                <x-label class="text-white text-xl font-poppins dark:text-white" for="email" value="{{ __('Email')}}" />
                <div 
                class="flex flex-row items-center w-full bg-white rounded-md hover:border-indigo-500 border-transparent border-2 mt-2">
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" 
                class="w-full py-2.5 ml-0 px-0 border-transparent focus:border-transparent focus:ring-0 dark:bg-white dark:border-transparent dark:focus:ring-0 dark:focus:border-transparent"
                placeholder="{{ __('Masukan Alamat Email Anda') }}" required
                autocomplete="username" :value="old('email')" />
            <x-input-error :for="$errors->get('email')" class="mt-2" />
                </div>
            </div>


        <div class="mt-4">             
            <x-label class="text-white text-xl font-poppins dark:text-white" for="password" value="{{ __('Password') }}" />
            <div class="mt-0 mx-auto flex items-center">
                <div class="relative flex items-center w-full bg-white rounded-md hover:border-indigo-500 border-transparent border-2 mt-2">
                    <x-input id="password" class="block mt-1 w-full" type="password" name="password" 
                              class="w-full py-2,5 ml-0 px-0 border-transparent focus:border-transparent focus:ring-0 dark:bg-white dark:border-transparent dark:focus:ring-0 dark:focus:border-transparent"
                              placeholder="{{ __('Masukan Kata Sandi Anda') }}" required autocomplete="current-password" />
                    <img class="w-6 h-6 absolute right-0 transform -translate-x-8" src="{{ asset('assets/img/eye-hidden.png') }}" alt="Hidden Password" id="eye-hidden" onclick="show()" />
                    <img class="w-6 h-6 absolute right-0 transform -translate-x-8 hidden" src="{{ asset('assets/img/eye-show.png') }}" alt="Show Password" id="eye-show" onclick "show()"/>
                </div>
            </div>
        </div>
            
        <div class="mt-4">
                <x-label class="text-white text-xl font-poppins dark:text-white" for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <div class="mt-0 mx-auto flex items-center">
                    <div class="relative flex items-center w-full bg-white rounded-md hover:border-indigo-500 border-transparent border-2 mt-2">
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation"
                            class="w-full py-2,5 ml-0 px-0 border-transparent focus:border-transparent focus:ring-0 dark:bg-white dark:border-transparent dark:focus:ring-0 dark:focus:border-transparent"
                            placeholder="{{ __('Konfirmasi Kata Sandi Anda') }}" required autocomplete="new-password" />
                <img class="w-6 h-6 absolute right-0 transform -translate-x-8" src="{{ asset('assets/img/eye-hidden.png') }}" alt="Hidden Password" id="eye-hidden" onclick="show()" />
                <img class="w-6 h-6 absolute right-0 transform -translate-x-8 hidden" src="{{ asset('assets/img/eye-show.png') }}" alt="Show Password" id="eye-show" onclick "show()"/>
                </div>
            </div>
        </div>

        <div class="mt-4">
            <x-label class="text-white text-xl font-poppins dark:text-white" for="phone_number" value="{{ __('No. Telepon') }}" />
            <div class="relative flex items-center w-full bg-white rounded-md hover:border-indigo-500 border-transparent border-2 mt-2">
            <x-input id="phone_number" class="block mt-1 w-full" type="text" name="phone_number" class="w-full py-2,5 ml-0 px-0 border-transparent focus:border-transparent focus:ring-0 dark:bg-white dark:border-transparent dark:focus:ring-0 dark:focus:border-transparent"
            placeholder="{{ __('Masukkan Telepon Anda') }}" :value="old('phone_number')" required />
            </div>
        </div>

            <div class="mt-4">
                <x-label class="text-white text-xl font-poppins dark:text-white" for="name" value="{{ __('Nama Lengkap') }}" />
                <div class="relative flex items-center w-full bg-white rounded-md hover:border-indigo-500 border-transparent border-2 mt-2">
                <x-input id="name" class="block mt-1 w-full" type="text" name="name"
                class="w-full py-2,5 ml-0 px-0 border-transparent focus:border-transparent focus:ring-0 dark:bg-white dark:border-transparent dark:focus:ring-0 dark:focus:border-transparent"
                placeholder="{{ __('Masukkan Nama Lengkap Anda Sesuai KTP') }}" 
                :value="old('name')" required autofocus autocomplete="name" />
                </div>
            </div>

            <div class="mt-4">
                <x-label class="text-white text-xl font-poppins dark:text-white" for="identity_number" value="{{ __('NIK KTP') }}" />
                <div class="relative flex items-center w-full bg-white rounded-md hover:border-indigo-500 border-transparent border-2 mt-2">
                <x-input id="identity_number" class="block mt-1 w-full" type="text" name="identity_number" 
                class="w-full py-2,5 ml-0 px-0 border-transparent focus:border-transparent focus:ring-0 dark:bg-white dark:border-transparent dark:focus:ring-0 dark:focus:border-transparent"
                placeholder="{{ __('Masukkan Nama Lengkap Anda Sesuai KTP') }}"
                :value="old('identity_number')" required />
                </div>
            </div>

            
            <p class="mt-4 text-white text-lg">Untuk melanjutkan pendaftaran di MyCuan, kami membutuhkan persetujuan Anda pada dokumen di bawah ini:</p>

            <div class="mt-4">
                <div class="flex items-center">
                    <div class="ml-2 text-white">
                        {!! __('<strong>Syarat & Ketentuan</strong>') !!}
                    </div>
                </div>
            </div>            

            <input type="hidden" name="role" value="lender">

        @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ml-2, text-white">
                                {!! __('saya telah :membaca and :menyetujui semua ketentuan di atas', [
                                        'membaca' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-white-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">'.__('membaca').'</a>',
                                        'menyetujui' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-white-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">'.__('menyetujui').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <div class="mt-4">
                <button class="w-full mt-3 h-10 bg-[#186F65] text-white font-bold text-base font-worksans justify-center rounded-md hover:bg-white hover:text-[#186F65]">
                    {{ __('DAFTAR') }}
                </button>
            </div>
        </form>

</x-guest-layout>
