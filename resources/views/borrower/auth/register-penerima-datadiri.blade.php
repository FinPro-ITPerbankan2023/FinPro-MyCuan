@section('title', 'Register Penerima Data Diri')

<x-guest-layout>

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if($errors->any())
    {!! implode('', $errors->all('<div>:message</div>')) !!}
@endif
    <div class="bg-[linear-gradient(62deg,_#fff,_#13A89E_110%)] sm:h-full lg:h-full md:h-full xl:h-full 2xl:h-screen">
            @include('layouts.include.navigation.navigation-register-penerima')
            <div class="flex flex-col bg-white w-8/12 mx-auto my-2 rounded-xl border-b-2 border-solid">

            <h1 class="font-worksans font-extrabold my-5 text-lg ml-10 dark:text-black" >Penerima Dana</h1>
            <form method="POST" action="" enctype="multipart/form-data">
                @csrf
             <div class="flex flex-row">
                <div class="w-1/2">
                    <div class="ml-5">
                        <!-- Full name -->
                        <div class="ml-3 mt-2 form-group">
                            <x-input-label  class="text-[#868686] text-sm font-poppins dark:text-[#868686]" for="full_name" 
                                value="{{ __('Nama Lengkap KTP')}}" />
                            <div
                                class="flex flex-row items-center w-3/4 bg-white rounded-lg border-indigo-500 border-2 mt-2">
                                <x-input name="full_name" type="text" id="full_name"
                                    class="w-full py-2.5 ml-1 px-0 border-transparent  focus:border-transparent focus:ring-0 dark:bg-white dark:border-transparent dark:focus:ring-0 dark:focus:border-transparent"
                                    placeholder="{{ __('Silakan masukan nama lengkap Anda') }}" required
                                    autocomplete="namalengkap" />
                            </div>
                            @error('full_name')
                             <div class="text-danger">
                                 <small class="text-danger" style="color: red">{{$message}}</small>
                                    </div>
                           @enderror
                        </div>
                        <!-- Number identity -->
                        <div class="ml-3 mt-2 form-group">
                            <x-input-label class="text-[#868686] text-lg font-poppins dark:text-[#868686]" for="number_identity"
                                value="{{ __('NIK')}}" />
                            <div
                                class="flex flex-row items-center w-3/4 bg-white rounded-lg border-indigo-500 border-2 mt-2">
                                <x-input name="number_identity" type="text" id="number_identity"
                                    class="w-full py-2.5 ml-1 px-0 border-transparent  focus:border-transparent focus:ring-0 dark:bg-white dark:border-transparent dark:focus:ring-0 dark:focus:border-transparent"
                                    placeholder="{{ __('Silakan masukan NIK Anda') }}" required autocomplete="nik" />
                                </div>
                                @error('number_identity')
                                <div class="text-danger">
                                    <small class="text-danger" style="color: red">{{$message}}</small>
                                       </div>
                              @enderror
                        </div>
                        <!-- Date Birth -->
                        <div class="ml-3 mt-2 form-group">
                            <x-input-label class="text-[#868686] text-lg font-poppins dark:text-[#868686]" for="date_birth"
                                value="{{ __('Tanggal Lahir')}}" />
                            <div
                                class="flex flex-row items-center w-3/4 bg-white rounded-lg border-indigo-500 border-2 mt-2">
                                <x-input name="date_birth" type="date" id="date_birth"
                                    class="w-full py-2.5 ml-1 px-0 border-transparent  focus:border-transparent focus:ring-0 dark:bg-white dark:border-transparent dark:focus:ring-0 dark:focus:border-transparent"
                                    placeholder="{{ __('Silakan masukan tanggal lahir sesuai KTP Anda') }}" required
                                    autocomplete="tgllahir" />
                                    @error('date_birth')
                                    <div class="text-danger">
                                        <small class="text-danger" style="color: red">{{$message}}</small>
                                    </div>
                                @enderror
                                
                            </div>
                        </div>
                        <!-- birth_place -->
                        <div class="ml-3 mt-2 form-group">
                            <x-input-label class="text-[#868686] text-lg font-poppins dark:text-[#868686]" for="birth_place"
                                value="{{ __('Tempat Lahir')}}" />
                            <div
                                class="flex flex-row items-center w-3/4 bg-white rounded-lg border-indigo-500 border-2 mt-2">
                                <x-input name="birth_place" type="text" id="birth_place"
                                    class="w-full py-2.5 ml-1 px-0 border-transparent  focus:border-transparent focus:ring-0 dark:bg-white dark:border-transparent dark:focus:ring-0 dark:focus:border-transparent"
                                    placeholder="{{ __('Silakan masukan tempat lahir sesuai KTP Anda') }}" required
                                    autocomplete="tmptlahir" />
                            </div>
                            @error('birth_place')
                            <div class="text-danger">
                                <small class="text-danger" style="color: red">{{$message}}</small>
                                   </div>
                          @enderror
                        </div>
                        <!-- Street -->
                        <div class="ml-3 mt-2 form-group">
                            <x-input-label class="text-[#868686] text-lg font-poppins dark:text-[#868686]" for="street"
                                value="{{ __('Alamat Lengkap')}}" />
                            <div
                                class="flex flex-row items-center w-3/4 bg-white rounded-lg border-indigo-500 border-2 mt-2">
                                <x-input name="street" type="text" id="street"
                                    class="w-full py-2.5 ml-1 px-0 border-transparent  focus:border-transparent focus:ring-0 dark:bg-white dark:border-transparent dark:focus:ring-0 dark:focus:border-transparent"
                                    placeholder="{{ __('Jalan xxx') }}" required autocomplete="alamat" />
                            </div>
                            @error('street')
                            <div class="text-danger">
                                <small class="text-danger" style="color: red">{{$message}}</small>
                                   </div>
                          @enderror
                        </div>
                        <!-- Province -->
                        <div class="ml-3 mt-2 form-group">
                            <x-input-label class="text-[#868686] text-lg font-poppins dark:text-[#868686]" for="province"
                                value="{{ __('Provinsi')}}" />
                            <div
                                class="flex flex-row items-center w-3/4 bg-white rounded-lg border-indigo-500 border-2 mt-2">
                                <x-input name="province" type="text" id="province"
                                    class="w-full py-2.5 ml-1 px-0 border-transparent  focus:border-transparent focus:ring-0 dark:bg-white dark:border-transparent dark:focus:ring-0 dark:focus:border-transparent"
                                    placeholder="{{ __('Jawa, Kalimantan, dkk') }}" required autocomplete="provinsi" />
                            </div>
                            @error('province')
                            <div class="text-danger">
                                <small class="text-danger" style="color: red">{{$message}}</small>
                                   </div>
                          @enderror
                        </div>
                        <!-- city -->
                        <div class="ml-3 mt-2 form-group">
                            <x-input-label class="text-[#868686] text-lg font-poppins dark:text-[#868686]" for="city"
                                value="{{ __('Kab/Kota')}}" />
                            <div
                                class="flex flex-row items-center w-3/4 bg-white rounded-lg border-indigo-500 border-2 mt-2">
                                <x-input name="city" type="text" id="city"
                                    class="w-full py-2.5 ml-1 px-0 border-transparent  focus:border-transparent focus:ring-0 dark:bg-white dark:border-transparent dark:focus:ring-0 dark:focus:border-transparent"
                                    placeholder="{{ __('Masukan Kab/Kota Anda') }}" required autocomplete="kabkota" />
                            </div>
                            @error('city')
                            <div class="text-danger">
                                <small class="text-danger" style="color: red">{{$message}}</small>
                            </div>
                            @enderror
                        </div>
                        <!-- district -->
                        <div class="ml-3 mt-2 form-group">
                            <x-input-label class="text-[#868686] text-lg font-poppins dark:text-[#868686]" for="district"
                                value="{{ __('Kecamatan')}}" />
                            <div
                                class="flex flex-row items-center w-3/4 bg-white rounded-lg border-indigo-500 border-2 mt-2">
                                <x-input name="district" type="text" id="district"
                                    class="w-full py-2.5 ml-1 px-0 border-transparent focus:border-transparent focus:ring-0 dark:bg-white dark:border-transparent dark:focus:ring-0 dark:focus:border-transparent"
                                    placeholder="{{ __('Masukan Kecamatan Anda') }}" required autocomplete="kecamtan" />
                            </div>
                            @error('district')
                            <div class="text-danger">
                                <small class="text-danger" style="color: red">{{$message}}</small>
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>
                        <!-- zip_code -->
                <div class="w-1/2">
                    <div class="ml-10">
                        <div class="ml-3 mt-2 form-group">
                            <x-input-label class="text-[#868686] text-sm font-poppins dark:text-[#868686]" for="zip_code"
                                value="{{ __('Kode Pos')}}" />
                            <div
                                class="flex flex-row items-center w-10/12 bg-white rounded-lg border-indigo-500 border-2 mt-2">
                                <x-input name="zip_code" type="text" id="zip_code"
                                    class="w-full py-2.5 ml-1 px-0 border-transparent  focus:border-transparent focus:ring-0 dark:bg-white dark:border-transparent dark:focus:ring-0 dark:focus:border-transparent"
                                    placeholder="{{ __('709123') }}" required autocomplete="kodepos" />
                            </div>
                            @error('zip_code')
                            <div class="text-danger">
                                <small class="text-danger" style="color: red">{{$message}}</small>
                            </div>
                            @enderror
                        </div>
                        <!-- account_number -->

                        <div class="ml-3 mt-2 form-group">
                            <x-input-label class="text-[#868686] text-sm font-poppins "
                                for="account_number" value="{{ __('Nomor Rekening')}}" />
                            <div
                                class="flex flex-row items-center w-10/12 bg-white rounded-lg border-indigo-500 border-2 mt-2">
                                <x-input name="account_number" type="text" id="account_number"
                                    class="w-full py-2.5 ml-1 px-0 border-transparent  focus:border-transparent focus:ring-0 dark:bg-white dark:border-transparent dark:focus:ring-0 dark:focus:border-transparent"
                                    placeholder="{{ __('000725649926') }}" required autocomplete="nomorrekening" />
                            </div>
                            @error('account_number')
                            <div class="text-danger">
                                <small class="text-danger" style="color: red">{{$message}}</small>
                            </div>
                            @enderror
                        </div>
                        <!-- account_name -->

                        <div class="ml-3 mt-2 form-group">
                            <x-input-label class="text-[#868686] text-sm font-poppins"
                                for="account_name" value="{{ __('Nama Rekening')}}" />
                            <div
                                class="flex flex-row items-center w-10/12 bg-white rounded-lg border-indigo-500 border-2 mt-2">
                                <x-input name="account_name" type="text" id="account_name"
                                    class="w-full py-2.5 ml-1 px-0 border-transparent  focus:border-transparent focus:ring-0 dark:bg-white dark:border-transparent dark:focus:ring-0 dark:focus:border-transparent"
                                    placeholder="{{ __('a/n  xxxxx') }}" required autocomplete="namarekening" />
                            </div>
                            @error('account_name')
                            <div class="text-danger">
                                <small class="text-danger" style="color: red">{{$message}}</small>
                            </div>
                            @enderror
                        </div>
                        <!-- bank_name -->

                        <div class="ml-3 mt-2 form-group">
                            <x-input-label class="text-[#868686] text-sm font-poppins " for="bank_name"
                                value="{{ __('Nama Bank')}}" />
                            <div
                                class="flex flex-row items-center w-10/12 bg-white rounded-lg border-indigo-500 border-2 mt-2">
                                <x-input name="bank_name" type="text" id="bank_name"
                                    class="w-full py-2.5 ml-1 px-0 border-transparent  focus:border-transparent focus:ring-0 dark:bg-white dark:border-transparent dark:focus:ring-0 dark:focus:border-transparent"
                                    placeholder="{{ __('Bank Central Asia (BCA)') }}" required
                                    autocomplete="namabank" />
                            </div>
                            @error('bank_name')
                            <div class="text-danger">
                                <small class="text-danger" style="color: red">{{$message}}</small>
                            </div>
                            @enderror
                        </div>
                    </div>
                        <!--selfie Image -->
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
                                            <span type="file"
                                                class="flex w-1/4 bg-[#185F65] text-white text-base items-center justify-center font-bold h-12 border rounded-lg cursor-pointer"
                                               for="file_upload_foto_ktp" name="identity_image" id="identity_image" onclick="uploadfotoktp()">UPLOAD</span>
                                                <span id="textfotoktp" class="flex items-center ml-3 dark:text-black">No file chosen,
                                                yet.</span>
                                        </div>
                                    </div>
                                </label>
                                <x-input class="hidden" type="file" name="identity_image" id="file_upload_foto_ktp" accept="image/png, image/jpeg" />
                            </div>
                        <!--identity Image -->

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
                                            <span type="file"
                                                class="flex w-1/4 bg-[#185F65] text-white text-base items-center justify-center font-bold h-12 border rounded-lg cursor-pointer"
                                                for="file_upload_ktp_selfie" name="selfie_image" id="selfie_image" onclick="uploadktp()">UPLOAD</span>
                                                <span id="textktp" class="flex items-center ml-3 dark:text-black">No file chosen,
                                                yet.</span>
                                        </div>
                                    </div>
                                    <x-input class="hidden" type="file" name="selfie_image" id="file_upload_ktp_selfie" accept="image/png, image/jpeg" />
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
             </div>
             <div class="flex w-full m-5 justify-center">
                <button
                    class="bg-[#EFEFFD] mx-0 w-2/6 h-10 text-[#185F65] font-worksans font-extrabold rounded-md hover:border-indigo-500 hover:border" type="submit" name="add">Next</button>
            </div>
         </form>
        </div>
    </div>

    <script>
        function uploadfotoktp() {
            const realFileBtn = document.getElementById("file_upload_foto_ktp");
            const customBtn = document.getElementById("identity_image");
            const customTxt = document.getElementById("textfotoktp");
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
                    customTxt.innerHTML = "No file chosen, yet.";
                }
            });
        }

        function uploadktp() {
            const realFileBtn = document.getElementById("file_upload_ktp_selfie");
            const customBtn = document.getElementById("selfie_image");
            const customTxt = document.getElementById("textktp");
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
                    customTxt.innerHTML = "No file chosen, yet.";
                }
            });
        }

        var datadiri = document.getElementById("datadiri");

        datadiri.style.backgroundColor = '#185F65';
        datadiri.style.color = "#EFEFFD"
    </script>

</x-guest-layout>
