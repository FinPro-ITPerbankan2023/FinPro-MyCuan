<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<x-guest-layout>
    <div class="bg-[linear-gradient(62deg,_#fff,_#13A89E_110%)] sm:h-full lg:h-full md:h-full xl:h-full 2xl:h-screen">
        <div class="flex flex-wrap items-center h-40 ">
            <img src="{{asset('assets/img/Logo_MyCuan.png')}}" alt="Logo MyCuan" class="w-20 h-20 ml-28">
            <p class="text-black ml-8 mt-4 font-semibold font-poppins text-2xl">MyCuan</p>
        </div>
        <div class="flex flex-row items-center justify-center flex-1">
            <div class="bg-white rounded-md" style="margin-right: 20px;">
                <button class="text-white bg-[#185F65] justify-center py-3 px-6 rounded-md font-poppins font-bold text-lg mr-4">
                    PRASYARAT
                </button>
                <button class="bg-white text-[#185F65] justify-center py-3 px-6 rounded-md font-poppins font-bold text-lg mr-4">
                    DATA DIRI
                </button>
                <button class="bg-white text-[#185F65] justify-center py-3 px-6 rounded-md font-poppins font-bold text-lg mr-4">
                    INFORMASI USAHA
                </button>
            </div>
        </div>
        <div class="flex flex-col items-center pb-20 px-50">
            <div class="w-1/2 p-10 ml-32 ml-auto bg-white rounded-lg shadow-xl" style="margin-left: 50px; margin-top:50px">
                <div class="flex flex-col">
                    <form id="prasyaratForm">
                        <div class="flex flex-col items-center justify-center">
                            <div class="flex items-center">
                                <img src="{{asset('assets/img/Logo_MyCuan.png')}}" alt="Logo MyCuan" class="w-16 mr-2 h-19">
                                <div class="text-black text-left font-poppins font-bold text-xl">
                                    Selamat Datang<br>di MyCuan
                                </div>
                            </div>
                            <br>
                            <div class="text-black text-left font-poppins text-lg">
                                Sebelum melanjutkan ke halaman berikutnya,<br>
                                ada prasyarat yang harus anda isi, dan diisi<br>
                                dengan sejujur-jujurnya
                            </div>
                            <br>
                            <br>
                            <div class="text-black text-left font-poppins text-lg">
                                Apakah anda memiliki penghasilan/bisnis :
                            </div>

                            <div class="grid grid-cols-2 gap-8 mt-4">
                                <div class="flex items-center" style="margin-left: -30px;">
                                    <input type="radio" id="ya" name="penghasilan" value="ya" class="w-8 h-8 text-[#186F65] bg-white border-gray-300 rounded focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-300 focus:ring-2 dark:bg-white dark:border-gray-600">
                                    <label for="ya" class="ml-4 text-black text-left font-poppins text-lg">Ya</label>
                                </div>

                                <div class="flex items-center">
                                    <input type="radio" id="tidak" name="penghasilan" value="tidak" class="w-8 h-8 ml-2 text-[#186F65] bg-white border-gray-300 rounded focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-300 focus:ring-2 dark:bg-white dark:border-gray-600">
                                    <label for="tidak" class="ml-4 text-black text-left font-poppins text-lg">Tidak</label>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-row items-center justify-center flex-1 mt-16 mb-10">
                            <button onclick="checkPenghasilan()" class="w-1/4 h-10 mt-2  bg-[#186F65] text-white font-bold text-base font-worksans justify-center rounded-md hover:text-white hover:bg-[#b6ecd3] ">
                                {{ __('Lanjut') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


</x-guest-layout>

<script>
    $(document).ready(function() {
        $('#prasyaratForm').submit(function(event) {
            event.preventDefault();

            var penghasilanValue = $('input[name="penghasilan"]:checked').val();

            if (penghasilanValue) {
                if (penghasilanValue === 'ya') {
                    window.location.href = "{{ route('register-borrower-profile') }}";
                } else if (penghasilanValue === 'tidak') {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Perhatian!',
                        text: 'Anda belum punya bisnis, Anda belum bisa mengajukan pinjaman.',
                        confirmButtonText: 'OK'
                    });
                }
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Pilih salah satu opsi untuk melanjutkan.'
                });
            }
        });
    });
</script>
