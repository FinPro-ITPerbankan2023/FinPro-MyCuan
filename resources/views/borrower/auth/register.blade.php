@section('title', 'Register Penerima Dana')

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
                <div class="w-8/12 mx-auto">
                    <h1 class="text-white mt-16 font-bold font-poppins text-3xl text-center">Registrasi</h1>
                </div>
                <form method="POST" action="{{ route('register-role') }}">
                    @csrf
                    <div class="w-8/12 mt-16 mx-auto">
                        <x-input-label class="text-white text-xl font-poppins dark:text-white" for="email"
                            value="{{ __('Email')}}" />
                        <div
                            class="flex flex-row items-center w-full bg-white rounded-md hover:border-indigo-500 border-transparent border-2 mt-2">
                            <x-input name="email" type="email" id="email"
                                class="w-full py-2.5 ml-3 px-0 border-transparent focus:border-transparent focus:ring-0 dark:bg-white dark:border-transparent dark:focus:ring-0 dark:focus:border-transparent"
                                placeholder="{{ __('Masukan alamat email') }}" required autocomplete="username"
                                :value="old('email')" />
                        </div>
                    </div>
                    <div class="w-8/12 mt-6 mx-auto">
                        <x-input-label class="text-white text-xl font-poppins dark:text-white" for="password"
                            value="{{ __('Kata Sandi')}}" />
                        <div
                            class="flex flex-row items-center w-full bg-white rounded-md hover:border-indigo-500 border-transparent border-2 mt-2">
                            <x-input name="password" type="password" id="password"
                                class="w-full py-2.5 ml-3 px-0 border-transparent focus:border-transparent focus:ring-0 dark:bg-white dark:border-transparent dark:focus:ring-0 dark:focus:border-transparent"
                                placeholder="{{ __('Masukan kata sandi') }}" required autocomplete="current-password" />
                            <img class="w-6 h-6 mr-2" src="{{asset('assets/img/eye-hidden.png')}}" alt="Hidden Password"
                                id="eye-hidden" onclick="show()">
                            <img class="w-6 h-6 mr-2 hidden" src="{{asset('assets/img/eye-show.png')}}"
                                alt="Show Password" id="eye-show" onclick="show()">
                        </div>
                    </div>
                    <div class="w-8/12 mt-6 mx-auto">
                        <x-input-label class="text-white text-xl font-poppins dark:text-white" for="password"
                            value="{{ __('Konfirmasi kata sandi')}}" />
                        <div
                            class="flex flex-row items-center w-full bg-white rounded-md hover:border-indigo-500 border-transparent border-2 mt-2">
                            <x-input name="password" type="password" id="password-confirm"
                                class="w-full py-2.5 ml-3 px-0 border-transparent focus:border-transparent focus:ring-0 dark:bg-white dark:border-transparent dark:focus:ring-0 dark:focus:border-transparent"
                                placeholder="{{ __('Masukan konfirmasi kata sandi') }}" required
                                autocomplete="current-password" />
                            <img class="w-6 h-6 mr-2" src="{{asset('assets/img/eye-hidden.png')}}" alt="Hidden Password"
                                id="eye-hidden-confirm" onclick="show()">
                            <img class="w-6 h-6 mr-2 hidden" src="{{asset('assets/img/eye-show.png')}}"
                                alt="Show Password" id="eye-show-confirm" onclick="showconfirm()">
                        </div>
                    </div>
                    <div class="w-8/12 mt-6 mx-auto">
                        <x-input-label class="text-white text-xl font-poppins dark:text-white" for="password"
                            value="{{ __('No. Telepon')}}" />
                        <div
                            class="flex flex-row items-center w-full bg-white rounded-md hover:border-indigo-500 border-transparent border-2 mt-2">
                            <x-input id="phone" type="tel" placeholder="{{ __('Masukan nomor telepon') }} " name="phone"
                                class="w-full py-2.5 ml-3 px-0 border-transparent focus:border-transparent focus:ring-0 dark:bg-white dark:border-transparent dark:focus:ring-0 dark:focus:border-transparent" :value="old('phone_number')" required />
                        </div>
                    </div>
                    <div class="flex flex-col w-8/12 mt-6 mx-auto text-white font-poppins">
                        <div class="w-9/12 ">
                            <p class="text-lg">Untuk melanjutkan pendaftaran di MyCuan, Kami membutuhkan persetujuan
                                Anda pada dokumen dibawah ini:</p>
                        </div>
                        <ul class="list-disc ml-8 font-semibold text-lg mt-2">
                            <li>Syarat & Ketentuan</li>
                            <li>Kebijakan Privasi</li>
                        </ul>
                        <div class="flex flex-row w-9/12 mt-5">
                            <x-input id="checkbox-agree" type="checkbox" class="mt-1.5" onchange="enablebutton()" />
                            <p class="text-lg ml-4">Saya telah membaca dan menyetujui semua ketentuan di atas.</p>
                        </div>
                    </div>

                    <input type="hidden" name="role_id" value="2" />
                    <div class="flex flex-col w-8/12 mt-6 mx-auto justify-center">
                        <button id="button-register"
                            class="w-full mt-3 h-10 bg-white text-[#186F65] font-bold text-base font-worksans justify-center rounded-md hover:bg-[#186F65] hover:text-white">
                            {{ __('DAFTAR') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        // TODO: Still can't send user to database

        const phoneInputField = document.querySelector("#phone");
        const phoneInput = window.intlTelInput(phoneInputField, {
            utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
            initialCountry: "id",
        });

        buttonagree = document.getElementById("button-register");
        var checkboxagree = document.getElementById("checkbox-agree");
        buttonagree.disabled = true;
        checkboxagree.onclick = function () {
            if (checkboxagree.checked) {
                buttonagree.disabled = false;
            } else {
                buttonagree.disabled = true;
            }
        };

    </script>
</x-guest-layout>
