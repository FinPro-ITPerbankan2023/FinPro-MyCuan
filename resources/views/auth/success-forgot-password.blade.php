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

                <!-- image -->
                <div class="flex mx-auto items-center my-10">
                    <img src="{{asset('assets/img/MyCuanMaskot.png')}}" alt="Logo MyCuan" class="w-200 h-200 items-center">
                </div>

                <!-- judul -->
                <div class="flex mx-auto">
                    <h1 class="text-white font-bold font-poppins text-3xl text-center ">Selesai</h1>
                </div>

                <!-- deskripsi -->
                <div class="flex mx-auto text-sm text-white text-center mt-4 text-[16px]">
                    {{ __('Email penggantian kata sandi telah dikirim. Cek kotak masuk dari email Anda.') }}
                </div>

                <!-- router BELUM DIGANTI tolong diganti yaa-->
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf


                    <!-- button kirim -->
                    <div class="flex flex-col w-3/4 mt-6 mx-auto justify-center">
                        <button class="justify-center dark:text-black text-black dark:bg-white bg-white py-3 rounded-md hover:bg-gray-200 font-poppins text-relative my-10">
                            {{ __('LOGIN') }}
                        </button>
                    </div>

                </form>
</x-guest-layout>