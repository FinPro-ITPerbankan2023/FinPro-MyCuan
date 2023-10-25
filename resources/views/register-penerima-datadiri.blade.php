@section('title', 'Register Penerima Data Diri')

<x-guest-layout>

    <div class="bg-[linear-gradient(62deg,_#fff,_#13A89E_110%)] sm:h-full lg:h-full md:h-full xl:h-full 2xl:h-screen">
        <div class="">
            @include('layouts.include.navigation.navigation-register-penerima')
        </div>
        <div class="flex flex-col bg-white w-8/12 mx-auto my-2 rounded-xl border-b-2 border-solid">
            <div class="font-worksans font-extrabold my-5 text-lg ml-10 dark:text-black">
                <h1>Penerima Dana</h1>
            </div>
            <div class="flex flex-row">
                <div class="w-1/2">
                    <div class="ml-5">
                        <div class="ml-3 mt-2">
                            <x-input-label class="text-[#868686] text-sm font-poppins dark:text-[#868686]" for="namalengkap" 
                                value="{{ __('Nama Lengkap KTP')}}" />
                            <div
                                class="flex flex-row items-center w-3/4 bg-white rounded-lg border-indigo-500 border-2 mt-2">
                                <x-input name="namalengkap" type="text" id="namalengkap"
                                    class="w-full py-2.5 ml-1 px-0 border-transparent  focus:border-transparent focus:ring-0 dark:bg-white dark:border-transparent dark:focus:ring-0 dark:focus:border-transparent"
                                    placeholder="{{ __('Silakan masukan nama lengkap Anda') }}" required
                                    autocomplete="namalengkap" />
                            </div>
                        </div>
                        <div class="ml-3 mt-2">
                            <x-input-label class="text-[#868686] text-lg font-poppins dark:text-[#868686]" for="nik"
                                value="{{ __('NIK')}}" />
                            <div
                                class="flex flex-row items-center w-3/4 bg-white rounded-lg border-indigo-500 border-2 mt-2">
                                <x-input name="nik" type="text" id="nik"
                                    class="w-full py-2.5 ml-1 px-0 border-transparent  focus:border-transparent focus:ring-0 dark:bg-white dark:border-transparent dark:focus:ring-0 dark:focus:border-transparent"
                                    placeholder="{{ __('Silakan masukan NIK Anda') }}" required autocomplete="nik" />
                            </div>
                        </div>
                        <div class="ml-3 mt-2">
                            <x-input-label class="text-[#868686] text-lg font-poppins dark:text-[#868686]" for="tgllahir"
                                value="{{ __('Tanggal Lahir')}}" />
                            <div
                                class="flex flex-row items-center w-3/4 bg-white rounded-lg border-indigo-500 border-2 mt-2">
                                <x-input name="tgllahir" type="text" id="tgllahir"
                                    class="w-full py-2.5 ml-1 px-0 border-transparent  focus:border-transparent focus:ring-0 dark:bg-white dark:border-transparent dark:focus:ring-0 dark:focus:border-transparent"
                                    placeholder="{{ __('Silakan masukan tanggal lahir sesuai KTP Anda') }}" required
                                    autocomplete="tgllahir" />
                            </div>
                        </div>
                        <div class="ml-3 mt-2">
                            <x-input-label class="text-[#868686] text-lg font-poppins dark:text-[#868686]" for="tmptlahir"
                                value="{{ __('Tempat Lahir')}}" />
                            <div
                                class="flex flex-row items-center w-3/4 bg-white rounded-lg border-indigo-500 border-2 mt-2">
                                <x-input name="tmptlahir" type="text" id="tmptlahir"
                                    class="w-full py-2.5 ml-1 px-0 border-transparent  focus:border-transparent focus:ring-0 dark:bg-white dark:border-transparent dark:focus:ring-0 dark:focus:border-transparent"
                                    placeholder="{{ __('Silakan masukan tempat lahir sesuai KTP Anda') }}" required
                                    autocomplete="tmptlahir" />
                            </div>
                        </div>
                        <div class="ml-3 mt-2">
                            <x-input-label class="text-[#868686] text-lg font-poppins dark:text-[#868686]" for="alamat"
                                value="{{ __('Alamat Lengkap')}}" />
                            <div
                                class="flex flex-row items-center w-3/4 bg-white rounded-lg border-indigo-500 border-2 mt-2">
                                <x-input name="alamat" type="text" id="alamat"
                                    class="w-full py-2.5 ml-1 px-0 border-transparent  focus:border-transparent focus:ring-0 dark:bg-white dark:border-transparent dark:focus:ring-0 dark:focus:border-transparent"
                                    placeholder="{{ __('Jalan xxx') }}" required autocomplete="alamat" />
                            </div>
                        </div>
                        <div class="ml-3 mt-2">
                            <x-input-label class="text-[#868686] text-lg font-poppins dark:text-[#868686]" for="provinsi"
                                value="{{ __('Provinsi')}}" />
                            <div
                                class="flex flex-row items-center w-3/4 bg-white rounded-lg border-indigo-500 border-2 mt-2">
                                <x-input name="provinsi" type="text" id="provinsi"
                                    class="w-full py-2.5 ml-1 px-0 border-transparent  focus:border-transparent focus:ring-0 dark:bg-white dark:border-transparent dark:focus:ring-0 dark:focus:border-transparent"
                                    placeholder="{{ __('Jawa, Kalimantan, dkk') }}" required autocomplete="provinsi" />
                            </div>
                        </div>
                        <div class="ml-3 mt-2">
                            <x-input-label class="text-[#868686] text-lg font-poppins dark:text-[#868686]" for="kabkota"
                                value="{{ __('Kab/Kota')}}" />
                            <div
                                class="flex flex-row items-center w-3/4 bg-white rounded-lg border-indigo-500 border-2 mt-2">
                                <x-input name="kabkota" type="text" id="kabkota"
                                    class="w-full py-2.5 ml-1 px-0 border-transparent  focus:border-transparent focus:ring-0 dark:bg-white dark:border-transparent dark:focus:ring-0 dark:focus:border-transparent"
                                    placeholder="{{ __('Masukan Kab/Kota Anda') }}" required autocomplete="kabkota" />
                            </div>
                        </div>
                        <div class="ml-3 mt-2">
                            <x-input-label class="text-[#868686] text-lg font-poppins dark:text-[#868686]" for="kecamtn"
                                value="{{ __('Kecamatan')}}" />
                            <div
                                class="flex flex-row items-center w-3/4 bg-white rounded-lg border-indigo-500 border-2 mt-2">
                                <x-input name="kecamtn" type="text" id="kecamtn"
                                    class="w-full py-2.5 ml-1 px-0 border-transparent focus:border-transparent focus:ring-0 dark:bg-white dark:border-transparent dark:focus:ring-0 dark:focus:border-transparent"
                                    placeholder="{{ __('Masukan Kecamatan Anda') }}" required autocomplete="kecamtn" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-1/2">
                    <div class="ml-10">
                        <div class="ml-3 mt-2">
                            <x-input-label class="text-[#868686] text-sm font-poppins dark:text-[#868686]" for="kodepos"
                                value="{{ __('Kode Pos')}}" />
                            <div
                                class="flex flex-row items-center w-10/12 bg-white rounded-lg border-indigo-500 border-2 mt-2">
                                <x-input name="kodepos" type="text" id="kodepos"
                                    class="w-full py-2.5 ml-1 px-0 border-transparent  focus:border-transparent focus:ring-0 dark:bg-white dark:border-transparent dark:focus:ring-0 dark:focus:border-transparent"
                                    placeholder="{{ __('709123') }}" required autocomplete="kodepos" />
                            </div>
                        </div>
                        <div class="ml-3 mt-2">
                            <x-input-label class="text-[#868686] text-sm font-poppins "
                                for="nomorrekening" value="{{ __('Nomor Rekening')}}" />
                            <div
                                class="flex flex-row items-center w-10/12 bg-white rounded-lg border-indigo-500 border-2 mt-2">
                                <x-input name="nomorrekening" type="text" id="nomorrekening"
                                    class="w-full py-2.5 ml-1 px-0 border-transparent  focus:border-transparent focus:ring-0 dark:bg-white dark:border-transparent dark:focus:ring-0 dark:focus:border-transparent"
                                    placeholder="{{ __('000725649926') }}" required autocomplete="nomorrekening" />
                            </div>
                        </div>
                        <div class="ml-3 mt-2">
                            <x-input-label class="text-[#868686] text-sm font-poppins"
                                for="namarekening" value="{{ __('Nama Rekening')}}" />
                            <div
                                class="flex flex-row items-center w-10/12 bg-white rounded-lg border-indigo-500 border-2 mt-2">
                                <x-input name="namarekening" type="text" id="namarekening"
                                    class="w-full py-2.5 ml-1 px-0 border-transparent  focus:border-transparent focus:ring-0 dark:bg-white dark:border-transparent dark:focus:ring-0 dark:focus:border-transparent"
                                    placeholder="{{ __('a/n  xxxxx') }}" required autocomplete="namarekening" />
                            </div>
                        </div>
                        <div class="ml-3 mt-2">
                            <x-input-label class="text-[#868686] text-sm font-poppins " for="namabank"
                                value="{{ __('Nama Bank')}}" />
                            <div
                                class="flex flex-row items-center w-10/12 bg-white rounded-lg border-indigo-500 border-2 mt-2">
                                <x-input name="namabank" type="text" id="namabank"
                                    class="w-full py-2.5 ml-1 px-0 border-transparent  focus:border-transparent focus:ring-0 dark:bg-white dark:border-transparent dark:focus:ring-0 dark:focus:border-transparent"
                                    placeholder="{{ __('Bank Central Asia (BCA)') }}" required
                                    autocomplete="namabank" />
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col font-worksans bg-white mt-10 w-11/12 border border-solid rounded-lg">
                        <div>
                            <h3 class="font-extrabold text-xl p-5 dark:text-black">Masukkan foto : </h3>
                        </div>
                        <div>
                            <div class="relative w-3/4 font-worksans">
                                <label title="Click to upload" for="button_upload" class="w-3/4">
                                    <div class="flex flex-col">
                                        <div class="p-5">
                                            <span
                                                class="block text-base font-semibold relative text-black group-hover:text-blue-500 dark:text-black">
                                                Foto anda dengan memegang KTP di bagian dada :
                                            </span>
                                        </div>
                                        <div class="flex flex-row ml-5">
                                            <span
                                                class="flex w-1/4 bg-[#185F65] text-white text-base items-center justify-center font-bold h-12 border rounded-lg"
                                                id="buttonuploadfotoktp" onclick="uploadfotoktp()">UPLOAD</span>
                                            <span id="textfotoktp" class="flex items-center ml-3 dark:text-black">No file chosen,
                                                yet.</span>
                                        </div>
                                    </div>
                                </label>
                                <input class="hidden" type="file" id="file_upload_foto_ktp" />
                            </div>
                            <div class="relative w-3/4 font-worksans">
                                <label title="Click to upload" for="button3" class="w-3/4">
                                    <div class="flex flex-col">
                                        <div class="p-5">
                                            <span
                                                class="block text-base font-semibold relative text-black dark:text-black group-hover:text-blue-500">
                                                Foto KTP anda dengan jelas :
                                            </span>
                                        </div>
                                        <div class="flex flex-row ml-5 mb-5">
                                            <span
                                                class="flex w-1/4 bg-[#185F65] text-white text-base items-center justify-center font-bold h-12 border rounded-lg"
                                                id="buttonuploadktp" onclick="uploadktp()">UPLOAD</span>
                                            <span id="textktp" class="flex items-center ml-3 dark:text-black">No file chosen,
                                                yet.</span>
                                        </div>
                                    </div>
                                </label>
                                <input class="hidden" type="file" name="button2" id="file_upload_ktp" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex w-full m-5 justify-center">
                <button
                    class="bg-[#EFEFFD] mx-0 w-2/6 h-10 text-[#185F65] font-worksans font-extrabold rounded-md hover:border-indigo-500 hover:border" type="submit">Next</button>
            </div>
        </div>
    </div>

    <script>
        function uploadfotoktp() {
            const realFileBtn = document.getElementById("file_upload_foto_ktp");
            const customBtn = document.getElementById("buttonuploadfotoktp");
            const customTxt = document.getElementById("textfotoktp");

            customBtn.addEventListener("click", function () {
                realFileBtn.click();
            });

            realFileBtn.addEventListener("change", function () {
                if (realFileBtn.value) {
                    customTxt.innerHTML = realFileBtn.value.match(
                        /[\/\\]([\w\d\s\.\-\(\)]+)$/
                    )[1];
                } else {
                    customTxt.innerHTML = "No file chosen, yet.";
                }
            });
        }

        function uploadktp() {
            const realFileBtn = document.getElementById("file_upload_ktp");
            const customBtn = document.getElementById("buttonuploadktp");
            const customTxt = document.getElementById("textktp");

            customBtn.addEventListener("click", function () {
                realFileBtn.click();
            });

            realFileBtn.addEventListener("change", function () {
                if (realFileBtn.value) {
                    customTxt.innerHTML = realFileBtn.value.match(
                        /[\/\\]([\w\d\s\.\-\(\)]+)$/
                    )[1];
                } else {
                    customTxt.innerHTML = "No file chosen, yet.";
                }
            });
        }

        var datadiri = document.getElementById("datadiri");

        datadiri.style.backgroundColor = '#185F65';
        datadiri.style.color = "#EFEFFD"
    </script>

</x-guest-layout>
