<x-guest-layout>
    <div class="bg-gradient-to-bl from-[#13A89E] max-h-full max-w-full">
        <div class="flex flex-wrap max-h-full p-20">
            <div class="flex flex-row items-center ml-auto">
                <img src="{{asset('assets/img/Logo_MyCuan.png')}}" alt="Logo MyCuan" class="w-16 h-19 mr-2">
                <p class="text-[#0f0e0e] text-center font-poppins text-md ml-2">MyCuan</p>
            </div>
        <div class="flex flex-1 flex-row items-center justify-center">
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
        </div>

        <div class="flex flex-col items-center pb-20 px-20">
            <div class="bg-white rounded-lg p-10 shadow-xl w-1/2 ml-auto ml-32" style="margin-left: 120px;">
                <div class="flex flex-col">

                    <div class="flex items-center justify-center flex-col">
                        <div class="flex items-center">
                            <img src="{{asset('assets/img/Logo_MyCuan.png')}}" alt="Logo MyCuan" class="w-16 h-19 mr-2">
                        <div class="text-[#0f0e0e] text-left font-poppins font-bold text-xl">
                            Selamat Datang<br>di MyCuan
                        </div>
                        </div>
                        <br>
                        <div class="text-[#0f0e0e] text-left font-poppins text-lg">
                            Sebelum melanjutkan ke halaman berikutnya,<br>
                            ada prasyarat yang harus anda isi, dan diisi<br>
                            dengan sejujur-jujurnya
                        </div>
                        <br>
                        <br>
                        <div class="text-[#0f0e0e] text-left font-poppins text-lg">
                        Apakah anda memiliki penghasilan/bisnis :  
                        </div>
                                    
                        <div class="grid grid-cols-2 gap-8 mt-4">
                            <div class="flex items-center" style="margin-left: -30px;">
                                <input type="checkbox" id="ya" name="penghasilan" value="ya" class="w-8 h-8 text-green-600 bg-white border-gray-300 rounded focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-300 focus:ring-2 dark:bg-white dark:border-gray-600">
                                <label for="ya" class="ml-4 text-[#605e5e] text-left font-poppins text-lg">Ya</label>
                            </div>
                                        
                            <div class="flex items-center">
                                <input type="checkbox" id="tidak" name="penghasilan" value="tidak" class="w-8 h-8 text-green-600 bg-white border-gray-300 rounded focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-300 focus:ring-2 dark:bg-white dark:border-gray-600 ml-2">
                                <label for="tidak" class="ml-4 text-[#605e5e] text-left font-poppins text-lg">Tidak</label>
                            </div>
                        </div>
                    </div>
                                
                    <div class="flex flex-1 flex-row items-center justify-center mt-20 mb-10">
                        <button class="bg-[#EFEFFD] text-[#185F65] justify-center py-3 px-10 rounded-md font-poppins font-bold text-lg w-full">
                            {{ __('Lanjut') }}
                        </button>
                    </div>
                </div>      
            </div>
        </div>
    </div>
</x-guest-layout>