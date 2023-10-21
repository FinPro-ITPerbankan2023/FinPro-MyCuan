@section('title', 'Register Role')

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
            <div class="flex flex-col w-3/4 h-3/4 mx-auto mt-2 content-center items-center">
                <div class="w-8/12 mx-auto mt-56 ">
                    <h1 class="text-white font-bold font-poppins text-3xl text-center">Daftar akun sebagai?</h1>
                </div>
                <div class="mt-16 w-4/6">
                    <h1 class="text-white font-poppins text-base">Saya ingin mulai memberi dana</h1>
                    <button
                        class="w-full h-10 mt-2 bg-[#186F65] text-white font-bold text-base font-worksans justify-center rounded-md hover:bg-white hover:text-[#186F65]"
                        onclick="window.location=''">
                        {{ __('PEMBERI DANA') }}
                    </button>
                </div>
                <div class="mt-16 w-4/6">
                    <h1 class="text-white font-poppins text-base">Saya ingin mencari modal usaha</h1>
                    <button
                        class="w-full h-10 mt-2 bg-white text-[#186F65] font-bold text-base font-worksans justify-center rounded-md hover:bg-[#186F65] hover:text-white"
                        onclick="window.location=''">
                        {{ __('PENERIMA DANA') }}
                    </button>
                </div>
            </div>
        </div>
</x-guest-layout>
