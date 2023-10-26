<x-guest-layout>
    <div class="bg-gradient-to-bl from-[#13A89E] max-h-full max-w-full">

        <!-- navbar -->
        <div class="flex flex-wrap max-h-full p-20">

            <!-- logo di navbar -->
            <div class="flex flex-row items-center">
                <img src="{{asset('assets/img/Logo_MyCuan.png')}}" alt="Logo MyCuan" class="w-20 h-20">
                <p class="text-[#868686] ps-8 text-center font-semibold font-poppins text-2xl">MyCuan</p>
            </div>

            <!-- button -->
            <div class="flex flex-1 flex-row items-center justify-center">
                <div class="bg-white rounded-md">
                    <button class="bg-white text-[#185F65] justify-center py-3 px-10 rounded-md font-poppins font-bold text-lg">
                        PRASYARAT
                    </button>
                    <button class="bg-white text-[#185F65] justify-center py-3 px-10 rounded-md font-poppins font-bold text-lg">
                        DATA DIRI
                    </button>
                    <button class="text-white bg-[#185F65] justify-center py-3 px-10 rounded-md font-poppins font-bold text-lg">
                        INFORMASI USAHA
                    </button>
                </div>
            </div>
        </div>

        <!-- body -->
        <div class="flex flex-col pb-20 px-20">
            <div class="bg-white rounded-lg p-10 shadow-xl">

                <!-- isi form nya dan upload berkas-->
                <div class="flex flex-wrap">

                    <!-- di sini dibagi dua. bagian pertama isi form -->
                    <div class="w-1/2 grid grid-flow-row gap-4 pt-10">

                        <div class="w-3/4 mx-auto font-poppins font-bold text-black text-2xl">Informasi Usaha</div>

                        <!-- nama usaha -->
                        <div class="w-3/4 mx-auto">
                            <x-input-label class="text-black text-xl font-poppins dark:text-black" for="email" value="{{ __('Nama Usaha')}}" />
                            <div class="flex flex-row items-center w-full bg-white rounded-md border-gray-600 hover:border-sky-600 border-2 mt-2">
                                <x-input name="email" type="email" id="email" class="w-full py-2.5 ml-3 px-0 focus:border-transparent focus:ring-0 dark:bg-white dark:border-transparent dark:focus:ring-0 dark:focus:border-transparent" placeholder="{{ __('Silakan masukan nama usaha Anda') }}" required autocomplete="username" :value="old('email')" />
                            </div>
                            <!-- alert email -->
                            <x-input-error for="email" class="mb-4 font-medium text-sm text-white dark:text-white justify-center text-center mt-5 bg-red-600 border-red-800 px-4 py-3 rounded relative" />

                            <!-- Session Status alert-->
                            @if (session('status'))
                            <div class="mb-4 font-medium text-sm text-white dark:text-white justify-center text-center mt-5 bg-green-600 border-green-800 px-4 py-3 rounded relative">
                                {{ session('status') }}
                            </div>
                            @endif
                        </div>

                        <!-- bidang usaha -->
                        <div class="w-3/4 mx-auto">
                            <x-input-label class="text-black text-xl font-poppins dark:text-black" for="email" value="{{ __('Bidang Usaha')}}" />
                            <div class="flex flex-row items-center w-full bg-white rounded-md border-gray-600 hover:border-sky-600 border-2 mt-2">
                                <x-input name="email" type="email" id="email" class="w-full py-2.5 ml-3 px-0 focus:border-transparent focus:ring-0 dark:bg-white dark:border-transparent dark:focus:ring-0 dark:focus:border-transparent" placeholder="{{ __('Silakan masukan bidang usaha Anda') }}" required autocomplete="username" :value="old('email')" />
                            </div>
                            <!-- alert email -->
                            <x-input-error for="email" class="mb-4 font-medium text-sm text-white dark:text-white justify-center text-center mt-5 bg-red-600 border-red-800 px-4 py-3 rounded relative" />

                            <!-- Session Status alert-->
                            @if (session('status'))
                            <div class="mb-4 font-medium text-sm text-white dark:text-white justify-center text-center mt-5 bg-green-600 border-green-800 px-4 py-3 rounded relative">
                                {{ session('status') }}
                            </div>
                            @endif
                        </div>

                        <!-- kepemilikan usaha -->
                        <div class="w-3/4 mx-auto">
                            <x-input-label class="text-black text-xl font-poppins dark:text-black" for="email" value="{{ __('Kepimilikan Usaha')}}" />
                            <div class="flex flex-row items-center w-full bg-white rounded-md border-gray-600 hover:border-sky-600 border-2 mt-2">
                                <x-input name="email" type="email" id="email" class="w-full py-2.5 ml-3 px-0 focus:border-transparent focus:ring-0 dark:bg-white dark:border-transparent dark:focus:ring-0 dark:focus:border-transparent" placeholder="{{ __('Swasta, UMKM, dll') }}" required autocomplete="username" :value="old('email')" />
                            </div>
                            <!-- alert email -->
                            <x-input-error for="email" class="mb-4 font-medium text-sm text-white dark:text-white justify-center text-center mt-5 bg-red-600 border-red-800 px-4 py-3 rounded relative" />

                            <!-- Session Status alert-->
                            @if (session('status'))
                            <div class="mb-4 font-medium text-sm text-white dark:text-white justify-center text-center mt-5 bg-green-600 border-green-800 px-4 py-3 rounded relative">
                                {{ session('status') }}
                            </div>
                            @endif
                        </div>

                        <!-- Lama usaha -->
                        <div class="w-3/4 mx-auto">
                            <x-input-label class="text-black text-xl font-poppins dark:text-black" for="email" value="{{ __('Lama Usaha')}}" />
                            <div class="flex flex-row items-center w-full bg-white rounded-md border-gray-600 hover:border-sky-600 border-2 mt-2">
                                <x-input name="email" type="email" id="email" class="w-full py-2.5 ml-3 px-0 focus:border-transparent focus:ring-0 dark:bg-white dark:border-transparent dark:focus:ring-0 dark:focus:border-transparent" placeholder="{{ __('1 tahun, 2 tahun, dkk') }}" required autocomplete="username" :value="old('email')" />
                            </div>
                            <!-- alert email -->
                            <x-input-error for="email" class="mb-4 font-medium text-sm text-white dark:text-white justify-center text-center mt-5 bg-red-600 border-red-800 px-4 py-3 rounded relative" />

                            <!-- Session Status alert-->
                            @if (session('status'))
                            <div class="mb-4 font-medium text-sm text-white dark:text-white justify-center text-center mt-5 bg-green-600 border-green-800 px-4 py-3 rounded relative">
                                {{ session('status') }}
                            </div>
                            @endif
                        </div>

                        <!-- tujuan peminjaman -->
                        <div class="w-3/4 mx-auto">
                            <x-input-label class="text-black text-xl font-poppins dark:text-black" for="email" value="{{ __('Tujuan Peminjaman')}}" />
                            <div class="flex flex-row items-center w-full bg-white rounded-md border-gray-600 hover:border-sky-600 border-2 mt-2">
                                <x-input name="email" type="email" id="email" class="w-full py-2.5 ml-3 px-0 focus:border-transparent focus:ring-0 dark:bg-white dark:border-transparent dark:focus:ring-0 dark:focus:border-transparent" placeholder="{{ __('Silakan masukkan tujuannya') }}" required autocomplete="username" :value="old('email')" />
                            </div>
                            <!-- alert email -->
                            <x-input-error for="email" class="mb-4 font-medium text-sm text-white dark:text-white justify-center text-center mt-5 bg-red-600 border-red-800 px-4 py-3 rounded relative" />

                            <!-- Session Status alert-->
                            @if (session('status'))
                            <div class="mb-4 font-medium text-sm text-white dark:text-white justify-center text-center mt-5 bg-green-600 border-green-800 px-4 py-3 rounded relative">
                                {{ session('status') }}
                            </div>
                            @endif
                        </div>

                        <!-- rata-rata penghasilan perbulan -->
                        <div class="w-3/4 mx-auto">
                            <x-input-label class="text-black text-xl font-poppins dark:text-black" for="email" value="{{ __('Rata-Rata Penghasilan Perbulan')}}" />
                            <div class="flex flex-row items-center w-full bg-white rounded-md border-gray-600 hover:border-sky-600 border-2 mt-2">
                                <x-input name="email" type="email" id="email" class="w-full py-2.5 ml-3 px-0 focus:border-transparent focus:ring-0 dark:bg-white dark:border-transparent dark:focus:ring-0 dark:focus:border-transparent" placeholder="{{ __('Rp1.000.000,-') }}" required autocomplete="username" :value="old('email')" />
                            </div>
                            <!-- alert email -->
                            <x-input-error for="email" class="mb-4 font-medium text-sm text-white dark:text-white justify-center text-center mt-5 bg-red-600 border-red-800 px-4 py-3 rounded relative" />

                            <!-- Session Status alert-->
                            @if (session('status'))
                            <div class="mb-4 font-medium text-sm text-white dark:text-white justify-center text-center mt-5 bg-green-600 border-green-800 px-4 py-3 rounded relative">
                                {{ session('status') }}
                            </div>
                            @endif
                        </div>

                        <!-- jumlah peminjaman -->
                        <div class="w-3/4 mx-auto">
                            <x-input-label class="text-black text-xl font-poppins dark:text-black" for="email" value="{{ __('Jumlah Peminjaman')}}" />
                            <div class="flex flex-row items-center w-full bg-white rounded-md border-gray-600 hover:border-sky-600 border-2 mt-2">
                                <x-input name="email" type="email" id="email" class="w-full py-2.5 ml-3 px-0 focus:border-transparent focus:ring-0 dark:bg-white dark:border-transparent dark:focus:ring-0 dark:focus:border-transparent" placeholder="{{ __('Rp10.000.000,-') }}" required autocomplete="username" :value="old('email')" />
                            </div>
                            <!-- alert email -->
                            <x-input-error for="email" class="mb-4 font-medium text-sm text-white dark:text-white justify-center text-center mt-5 bg-red-600 border-red-800 px-4 py-3 rounded relative" />

                            <!-- Session Status alert-->
                            @if (session('status'))
                            <div class="mb-4 font-medium text-sm text-white dark:text-white justify-center text-center mt-5 bg-green-600 border-green-800 px-4 py-3 rounded relative">
                                {{ session('status') }}
                            </div>
                            @endif
                        </div>


                    </div>

                    <!-- di sini dibagi dua. bagian kedua upload berkas-->
                    <div class="w-1/2 flex flex-col gap-10 shadow-xl border border-zinc-200 rounded-xl py-10">

                        <div class="w-3/4 mx-auto font-poppins font-bold text-black text-2xl">Masukkan Foto</div>

                        <!-- Foto surat izin bisnis -->
                        <div class="w-3/4 mx-auto">
                            <div class="flex flex-col">
                                <div class="flex items-center mb-4">
                                    <input id="default-checkbox" type="checkbox" value="" class="w-6 h-6 text-blue-600 bg-white border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-white dark:border-gray-600">
                                    <label for="default-checkbox" class="mx-5 font-bold text-lg text-gray-900 dark:text-gray-900">Foto surat izin bisnis:</label>
                                </div>
                                <div class="flex">
                                    <button class="text-white bg-[#185F65] justify-center py-3 px-10 rounded-md font-poppins font-bold text-lg">
                                        {{ __('UPLOAD') }}
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Foto bisnis/usaha -->
                        <div class="w-3/4 mx-auto">
                            <div class="flex flex-col">
                                <div class="flex items-center mb-4">
                                    <input id="default-checkbox" type="checkbox" value="" class="w-6 h-6 text-blue-600 bg-white border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-white dark:border-gray-600">
                                    <label for="default-checkbox" class="mx-5 font-bold text-lg text-gray-900 dark:text-gray-900">Foto bisnis/usaha:</label>
                                </div>
                                <div class="flex">
                                    <button class="text-white bg-[#185F65] justify-center py-3 px-10 rounded-md font-poppins font-bold text-lg">
                                        {{ __('UPLOAD') }}
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Foto produk yang dijual -->
                        <div class="w-3/4 mx-auto">
                            <div class="flex flex-col">
                                <div class="flex items-center mb-4">
                                    <input id="default-checkbox" type="checkbox" value="" class="w-6 h-6 text-blue-600 bg-white border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-white dark:border-gray-600">
                                    <label for="default-checkbox" class="mx-5 font-bold text-lg text-gray-900 dark:text-gray-900">Foto produk yang dijual:</label>
                                </div>
                                <div class="flex">
                                    <button class="text-white bg-[#185F65] justify-center py-3 px-10 rounded-md font-poppins font-bold text-lg">
                                        {{ __('UPLOAD') }}
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="w-3/4 mx-auto font-poppins font-bold text-[#185F65] text-xl">
                            Anda sudah mencapai pada tahap akhir pengisian data, pastikan semua sudah terisi dengan lengkap dan benar. Terimakasih karena sudah percaya MyCuan
                        </div>
                    </div>
                </div>

                <!-- button ajukan -->
                <div class="flex flex-1 flex-row items-center justify-center mt-20 mb-10">
                    <button class="bg-[#EFEFFD] text-[#185F65] justify-center py-3 rounded-md font-poppins font-bold text-lg w-2/6">
                        {{ __('AJUKAN') }}
                    </button>
                </div>
            </div>
        </div>
</x-guest-layout>