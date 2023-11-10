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

        <!-- body nya-->
        <div class="flex flex-col pb-20 px-20">

            <div class="bg-white rounded-lg p-10 shadow-xl">
                <form action="{{ route('business.information') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

                    <!-- isi form nya dan upload berkas-->
                    <div class="flex flex-wrap">

                        <!-- di sini dibagi dua. bagian pertama isi form -->
                        <div class="w-1/2 grid grid-flow-row gap-4 pt-10">


                            <div class="w-3/4 mx-auto font-poppins font-bold text-black text-2xl">Informasi Usaha</div>

                            <!-- nama usaha -->
                            <div class="w-3/4 mx-auto">
                                <x-input-label class="text-black text-xl font-poppins dark:text-black" for="business_name" value="{{ __('Nama Usaha')}}" />
                                <div class="flex flex-row items-center w-full bg-white rounded-md border-gray-600 hover:border-sky-600 border-2 mt-2">
                                    <x-input name="business_name" type="business_name" id="business_name" class="w-full py-2.5 px-0 focus:border-transparent focus:ring-0 dark:bg-white dark:border-transparent dark:focus:ring-0 dark:focus:border-transparent" placeholder="{{ __('Silakan masukan nama usaha Anda') }}" required autocomplete="username" :value="old('business_name')" />
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
                                <x-input-label class="text-black text-xl font-poppins dark:text-black" for="field_of_business" value="{{ __('Bidang Usaha')}}" />
                                <div class="flex flex-row items-center w-full bg-white rounded-md border-gray-600 hover:border-sky-600 border-2 mt-2">
                                    <x-input name="field_of_business" type="field_of_business" id="field_of_business" class="w-full py-2.5 px-0 focus:border-transparent focus:ring-0 dark:bg-white dark:border-transparent dark:focus:ring-0 dark:focus:border-transparent" placeholder="{{ __('Silakan masukan bidang usaha Anda') }}" required autocomplete="username" :value="old('field_of_business')" />
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
                                <x-input-label class="text-black text-xl font-poppins dark:text-black" for="business_ownership" value="{{ __('Kepimilikan Usaha')}}" />
                                <div class="flex flex-row items-center w-full bg-white rounded-md border-gray-600 hover:border-sky-600 border-2 mt-2">
                                    <x-input name="business_ownership" type="business_ownership" id="business_ownership" class="w-full py-2.5 px-0 focus:border-transparent focus:ring-0 dark:bg-white dark:border-transparent dark:focus:ring-0 dark:focus:border-transparent" placeholder="{{ __('Swasta, UMKM, dll') }}" required autocomplete="username" :value="old('business_ownership')" />
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

                            <!-- Lama usaha ini-->
                            <div class="w-3/4 mx-auto">
                                <x-input-label class="text-black text-xl font-poppins dark:text-black" for="business_duration" value="{{ __('Lama Usaha')}}" />
                                <div class="flex flex-row items-center w-full bg-white rounded-md border-gray-600 hover:border-sky-600 border-2 mt-2">
                                    <x-input name="business_duration" type="business_duration" id="business_duration" class="w-full py-2.5 px-0 focus:border-transparent focus:ring-0 dark:bg-white dark:border-transparent dark:focus:ring-0 dark:focus:border-transparent" placeholder="{{ __('1 tahun, 2 tahun, dkk') }}" required autocomplete="username" :value="old('business_duration')" />
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
                                <x-input-label class="text-black text-xl font-poppins dark:text-black" for="loan_purpose" value="{{ __('Tujuan Peminjaman')}}" />
                                <div class="flex flex-row items-center w-full bg-white rounded-md border-gray-600 hover:border-sky-600 border-2 mt-2">
                                    <x-input name="loan_purpose" type="loan_purpose" id="loan_purpose" class="w-full py-2.5 px-0 focus:border-transparent focus:ring-0 dark:bg-white dark:border-transparent dark:focus:ring-0 dark:focus:border-transparent" placeholder="{{ __('Silakan masukkan tujuannya') }}" required autocomplete="username" :value="old('loan_purpose')" />
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
                                <x-input-label class="text-black text-xl font-poppins dark:text-black" for="income_avg" value="{{ __('Rata-Rata Penghasilan Perbulan')}}" />
                                <div class="flex flex-row items-center w-full bg-white rounded-md border-gray-600 hover:border-sky-600 border-2 mt-2">
                                    <x-input name="income_avg" type="income_avg" id="income_avg" class="w-full py-2.5 px-0 focus:border-transparent focus:ring-0 dark:bg-white dark:border-transparent dark:focus:ring-0 dark:focus:border-transparent" placeholder="{{ __('Rp1.000.000,-') }}" required autocomplete="username" :value="old('income_avg')" />
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
                                <x-input-label class="text-black text-xl font-poppins dark:text-black" for="amount" value="{{ __('Jumlah Peminjaman')}}" />
                                <div class="flex flex-row items-center w-full bg-white rounded-md border-gray-600 hover:border-sky-600 border-2 mt-2">
                                    <x-input name="amount" type="amount" id="amount" class="w-full py-2.5  px-0 focus:border-transparent focus:ring-0 dark:bg-white dark:border-transparent dark:focus:ring-0 dark:focus:border-transparent" placeholder="{{ __('Rp10.000.000,-') }}" required autocomplete="username" :value="old('amount')" />
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

                        <div class="w-1/2 flex flex-col gap-10 shadow-xl border border-zinc-200 rounded-xl py-10">

                            <div class="w-3/4 ml-16 font-poppins font-bold text-black text-2xl">Masukkan Foto</div>

                            <div>
                                <div class="relative ml-16 w-3/4 font-worksans">
                                    <label title="Click to upload" for="button_upload" class="w-3/4">
                                        <div class="flex flex-col">
                                            <div class="p-5">
                                            <span
                                                class="block text-base font-semibold relative text-black group-hover:text-blue-500 dark:text-black">
                                                Foto Izin Usaha :
                                            </span>
                                            </div>
                                            <div class="flex flex-row ml-5">
                                            <span type="file"
                                                  class="flex w-1/4 bg-[#185F65] text-white text-base items-center justify-center font-bold h-12 border rounded-lg cursor-pointer"
                                                  for="file_upload_izin_usaha" name="business_permit_image" id="business_permit_image" onclick="uploadIzinUsaha()">UPLOAD</span>
                                                <span id="textIzinUsaha" class="flex items-center ml-3 dark:text-black">Belum ada file yang dipilih.</span>
                                            </div>
                                        </div>
                                    </label>
                                    <x-input class="hidden" type="file" name="business_permit_image" id="file_upload_izin_usaha" accept=" image/*" />
                                </div>
                                <!--identity Image -->

                                <div class="relative ml-16 w-3/4 font-worksans">
                                    <label title="Click to upload" for="button3" class="w-3/4">
                                        <div class="flex flex-col">
                                            <div class="p-5">
                                            <span
                                                class="block text-base font-semibold relative text-black dark:text-black group-hover:text-blue-500">
                                                Foto Tempat Usaha :
                                            </span>
                                            </div>
                                            <div class="flex flex-row ml-5">
                                            <span type="file"
                                                  class="flex w-1/4 bg-[#185F65] text-white text-base items-center justify-center font-bold h-12 border rounded-lg cursor-pointer"
                                                  for="file_upload_tempat_usaha" name="business_place_image" id="business_place_image" onclick="uploadTempatUsaha()">UPLOAD</span>
                                                <span id="textTempatUsaha" class="flex items-center ml-3 dark:text-black">Belum ada file yang dipilih.</span>
                                            </div>
                                        </div>
                                        <x-input class="hidden" type="file" name="business_place_image" id="file_upload_tempat_usaha" accept=" image/*`" />
                                    </label>
                                </div>

                                <div class="relative ml-16 w-3/4 font-worksans">
                                    <label title="Click to upload" for="button3" class="w-3/4">
                                        <div class="flex flex-col">
                                            <div class="p-5">
                                            <span
                                                class="block text-base font-semibold relative text-black dark:text-black group-hover:text-blue-500">
                                                Foto Produk Usaha :
                                            </span>
                                            </div>
                                            <div class="flex flex-row ml-5">
                                            <span type="file"
                                                  class="flex w-1/4 bg-[#185F65] text-white text-base items-center justify-center font-bold h-12 border rounded-lg cursor-pointer"
                                                  for="file_upload_produk_usaha" name="business_product_image" id="business_product_image" onclick="uploadProdukUsaha()">UPLOAD</span>
                                                <span id="textProdukUsaha" class="flex items-center ml-3 dark:text-black">Belum ada file yang dipilih.</span>
                                            </div>
                                        </div>
                                        <x-input class="hidden" type="file" name="business_product_image" id="file_upload_produk_usaha" accept=" image/*`" />
                                    </label>
                                </div>
                            </div>


                            <div class="w-3/4 ml-16 font-poppins font-bold text-[#185F65] text-xl">
                                Anda sudah mencapai pada tahap akhir pengisian data, pastikan semua sudah terisi dengan lengkap dan benar. Terimakasih karena sudah percaya MyCuan
                            </div>
                        </div>
                    </div>

                    <!-- button ajukan -->
                    <div class="flex flex-1 flex-row items-center justify-center mt-20 mb-10">
                        <button type="submit" class="bg-[#EFEFFD] text-[#185F65] justify-center py-3 rounded-md font-poppins font-bold text-lg w-2/6">
                            {{ __('AJUKAN') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function uploadIzinUsaha() {
            const realFileBtn = document.getElementById("file_upload_izin_usaha");
            const customBtn = document.getElementById("business_permit_image");
            const customTxt = document.getElementById("textIzinUsaha");
            event = event || window.event;

            if(event.target.id != realFileBtn){
                realFileBtn.click();
            };

            realFileBtn.addEventListener("change", function () {
                if (realFileBtn.value) {
                    customTxt.innerHTML = realFileBtn.value.match(
                        /[\/\\]([\w\d\s\.\-\(\)]+)$/
                    )[1];
                } else {
                    customTxt.innerHTML = "Belum ada file yang dipilih.";
                }
            });
        }

        function uploadTempatUsaha() {
            const realFileBtn = document.getElementById("file_upload_tempat_usaha");
            const customBtn = document.getElementById("business_place_image");
            const customTxt = document.getElementById("textTempatUsaha");
            event = event || window.event;

            if(event.target.id != realFileBtn){
                realFileBtn.click();
            };

            realFileBtn.addEventListener("change", function () {
                if (realFileBtn.value) {
                    customTxt.innerHTML = realFileBtn.value.match(
                        /[\/\\]([\w\d\s\.\-\(\)]+)$/
                    )[1];
                } else {
                    customTxt.innerHTML = "Belum ada file yang dipilih.";
                }
            });
        }

        function uploadProdukUsaha() {
            const realFileBtn = document.getElementById("file_upload_produk_usaha");
            const customBtn = document.getElementById("business_product_image");
            const customTxt = document.getElementById("textProdukUsaha");
            event = event || window.event;

            if(event.target.id != realFileBtn){
                realFileBtn.click();
            };

            realFileBtn.addEventListener("change", function () {
                if (realFileBtn.value) {
                    customTxt.innerHTML = realFileBtn.value.match(
                        /[\/\\]([\w\d\s\.\-\(\)]+)$/
                    )[1];
                } else {
                    customTxt.innerHTML = "Belum ada file yang dipilih.";
                }
            });
        }
        var datadiri = document.getElementById("datadiri");

        datadiri.style.backgroundColor = '#185F65';
        datadiri.style.color = "#EFEFFD"
    </script>

</x-guest-layout>
