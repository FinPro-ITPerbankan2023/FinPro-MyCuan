@section('title', 'Kebijakan Privasi')
<x-guest-layout>
    <div class="h-auto bg-gradient-to-bl from-[#13a89e] to-white-700 dark:text-black">
        <nav>
            <div class="flex px-10 py-5 mx-auto ">
                <div class="flex flex-row items-center justify-center grow-0 w-52">
                    <a href="{{ url('home')}}"><img src="{{asset('assets/img/Logo_MyCuan.png')}}" alt="Logo MyCuan"
                            class="w-20 h-20"></a>
                    <a href="{{ url('home')}}">
                        <p class="ml-6 text-2xl text-black font-poppins">MyCuan</p>
                    </a>
                </div>
                <div class="flex items-center justify-center grow font-poppins">
                    <a href="#persyaratan" class="mx-5 hover:text-white">Persyaratan Peminjaman</a>
                    <a href="#tentang" class="mx-5 hover:text-white">Tentang Kami</a>
                    <a href="#kontak" class="mx-5 hover:text-white">Kontak</a>
                </div>
                @if (Route::has('login'))
                <div class="flex items-center justify-center grow-0 ml-96">
                    @auth
                    <a href="{{ url('/dashboard') }}"
                        class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                    @else
                    <a href="{{ route('login') }}">
                    <button type="button"
                        class="font-['Poppins'] inline-block rounded bg-[#186f65] px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] w-48">Masuk</button></a>
                    @endauth
                </div>
                @endif
            </div>
        </nav>
        <div class="flex pb-10 mt-20 font-bold justify-left w-100 items-grow font-poppins ml-28">
            <p class="text-5xl ">Kebijakan Privasi</p>
    </div>
    <div class="font-sans text-justify w-100 word-wrap: break-word ml-28 w-[1180px] text-black text-2xl font-normal font-['Poppins']"><p><p>Selamat datang di My Cuan! My Cuan adalah platform P2P lending yang berkomitmen untuk melindungi privasi pengguna kami. Kebijakan Privasi ini menjelaskan bagaimana kami mengumpulkan, menggunakan, dan melindungi informasi pribadi Anda. Dengan menggunakan situs web My Cuan dan layanan terkaitnya, Anda menyetujui praktik yang diuraikan dalam kebijakan ini.</p>
    </div>
    <div>
    <div class="w-[1214px] h-[50px] text-black text-[30px] font-bold font-['Poppins'] ml-28 mt-20">1. Informasi yang Kami Kumpulkan<br/><br/></div>
    <div class="text-black text-2xl font-normal font-['Poppins'] text-justify  w-[1180px] ml-28 "><li> Informasi Identifikasi Pribadi: Kami dapat mengumpulkan informasi seperti nama, alamat email, alamat fisik, nomor telepon, dan informasi identifikasi lainnya saat Anda mendaftar atau mengajukan permohonan pinjaman.</li></div>
    <div class="text-black text-2xl font-normal font-['Poppins'] text-justify w-[1180px] ml-28 mt-10"><li> Keuangan: Kami akan mengumpulkan informasi keuangan yang Anda berikan saat mengajukan permohonan pinjaman atau melakukan investasi, seperti informasi tentang pendapatan, pengeluaran, dan laporan kredit. </li></div>
    <div class="text-black text-2xl font-normal font-['Poppins'] text-justify w-[1180px] ml-28 mt-10"><li> Informasi Penggunaan: Kami dapat mengumpulkan informasi tentang cara Anda menggunakan situs web kami, termasuk informasi tentang aktivitas penjelajahan, tautan yang Anda klik, dan interaksi Anda dengan situs web. </li></div>
    <div class="text-black text-2xl font-normal font-['Poppins'] text-justify w-[1180px] ml-28 mt-10"><li> Otomatis: Kami dapat menggunakan teknologi seperti cookie dan log server untuk mengumpulkan informasi otomatis tentang penggunaan Anda, termasuk alamat IP, jenis perangkat, browser yang digunakan, dan waktu akses. </li></div>
    </div>
    <div>
        <div class="w-[1214px] h-[50px] text-black text-[30px] font-bold font-['Poppins'] ml-28 mt-20">2. Penggunaan Informasi<br/><br/></div>
        <div class="text-black text-2xl font-normal font-['Poppins'] text-justify  w-[1180px] ml-28">a. Kami menggunakan informasi yang kami kumpulkan untuk :</div>
        <div class="w-[970px] text-black text-3xl font-normal font-['Poppins'] text-justify  ml-28">· Memproses permohonan pinjaman dan investasi.<br/>· Mengelola akun pengguna.<br/>· Memberikan layanan dan informasi terkait P2P lending.<br/>· Melakukan analisis risiko kredit.<br/>· Menyediakan layanan pelanggan.<br/>· Menginformasikan Anda tentang produk dan layanan terkait.<br/>· Menjalankan dan meningkatkan situs web kami.</div>
        <div class="text-black text-2xl font-normal font-['Poppins'] text-justify w-[1180px] ml-28 mt-10">b. Kami tidak akan menjual atau menyewakan informasi pribadi Anda kepada pihak ketiga tanpa izin Anda.</div>
    </div>
        <div>
            <div class="w-[1214px] h-[50px] text-black text-[30px] font-bold font-['Poppins'] ml-28 mt-20">3. Keamanan Informasi<br/><br/></div>
            <div class="w-[1179px] text-black text-3xl font-normal font-['Poppins'] text-justify w-[1180px] ml-28 mt-10">Kami memahami pentingnya menjaga keamanan informasi Anda. Kami menerapkan langkah-langkah keamanan fisik, elektronik, dan prosedural yang sesuai untuk melindungi informasi pribadi Anda. Namun, Anda juga bertanggung jawab untuk menjaga kerahasiaan kata sandi akun Anda.</div>
            </div>
            <div>
            <div class="w-[1214px] h-[50px] text-black text-[30px] font-bold font-['Poppins'] ml-28 mt-20">4. Akses dan Koreksi Informasi Pribadi Anda<br/><br/></div>
            <div class="w-[1179px] text-black text-3xl font-normal font-['Poppins'] text-justify w-[1180px] ml-28 mt-10">Anda memiliki hak untuk mengakses dan mengoreksi informasi pribadi Anda yang kami miliki. Anda dapat melakukannya dengan masuk ke akun Anda atau menghubungi kami melalui mycuan@gmail.com</div>
            </div>
            <div>
                <div class="w-[1214px] h-[50px] text-black text-[30px] font-bold font-['Poppins'] ml-28 mt-20">5. Cookie dan Teknologi Pelacakan<br/><br/></div>
                <div class="w-[1179px] text-black text-3xl font-normal font-['Poppins'] text-justify w-[1180px] ml-28 mt-10">Kami menggunakan cookie dan teknologi pelacakan serupa untuk mengumpulkan informasi tentang penggunaan situs web kami. Anda dapat mengelola preferensi cookie Anda melalui pengaturan browser Anda.</div>
                <div class="w-[1179px] text-black text-3xl font-normal font-['Poppins'] text-justify w-[1180px] ml-28 mt-10">Terima kasih telah menggunakan My Cuan. Kami berkomitmen untuk melindungi privasi Anda.</div>
                <div class="w-[1179px] text-black text-3xl font-normal font-['Poppins'] text-justify w-[1180px] ml-28 mt-10">Pastikan Anda memeriksa dan menyesuaikan kebijakan privasi tersebut sesuai dengan peraturan perlindungan data yang berlaku di yurisdiksi Anda dan dengan praktik bisnis yang sesuai. Selain itu, pastikan untuk memberikan informasi kontak yang dapat diakses oleh pengguna jika mereka memiliki pertanyaan atau kekhawatiran terkait privasi.</div>
                </div>
                <div class="h-screen mt-80 mx-36" id="kontak">
                    <div class="text-center text-6xl font-bold font-['Poppins'] mb-16">
                        <h1>Kontak</h1>
                    </div>
                    <div class="flex justify-between gap-10 mt-24">
                        <div class="font-['Poppins']">
                            <h1 class="mb-5 text-2xl font-bold">Hubungi Kami</h1>
                            <div class="flex gap-2 mb-3">
                                <svg width="34" height="22" viewBox="0 0 44 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M42.3077 0H1.69231C1.24348 0 0.813035 0.168571 0.495665 0.468629C0.178296 0.768688 0 1.17565 0 1.6V28.8C0 29.6487 0.356592 30.4626 0.991331 31.0627C1.62607 31.6629 2.48696 32 3.38462 32H40.6154C41.513 32 42.3739 31.6629 43.0087 31.0627C43.6434 30.4626 44 29.6487 44 28.8V1.6C44 1.17565 43.8217 0.768688 43.5043 0.468629C43.187 0.168571 42.7565 0 42.3077 0ZM22 17.03L6.04365 3.2H37.9563L22 17.03ZM15.804 16L3.38462 26.762V5.238L15.804 16ZM18.3087 18.17L20.8471 20.38C21.1593 20.651 21.5677 20.8013 21.9915 20.8013C22.4154 20.8013 22.8237 20.651 23.136 20.38L25.6744 18.17L37.9437 28.8H6.04365L18.3087 18.17ZM28.196 16L40.6154 5.236V26.764L28.196 16Z"
                                        fill="black" />
                                </svg>
                                <p>MyCuan@gmail.com</p>
                            </div>
                            <div class="flex gap-3">
                                <svg width="30" height="29" viewBox="0 0 40 39" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M38.0743 26.2196L28.6522 22.1031L28.6262 22.0914C28.1371 21.8874 27.6035 21.8055 27.0737 21.8532C26.544 21.9009 26.0348 22.0766 25.5922 22.3644C25.5401 22.3979 25.49 22.4344 25.4422 22.4736L20.5742 26.5199C17.4901 25.0593 14.3061 21.9783 12.8081 19.0103L16.9641 14.1918C17.0041 14.1431 17.0421 14.0943 17.0781 14.0417C17.367 13.6113 17.5423 13.118 17.5883 12.6056C17.6344 12.0933 17.5498 11.5778 17.3421 11.105V11.0816L13.1081 1.87942C12.8336 1.26178 12.3616 0.747272 11.7625 0.412694C11.1634 0.0781169 10.4694 -0.0585814 9.78409 0.0230056C7.07401 0.370707 4.58641 1.66837 2.7859 3.67363C0.985399 5.67888 -0.0048819 8.2546 1.80974e-05 10.9197C1.80974e-05 26.4029 12.9201 39 28.8002 39C31.5337 39.0048 34.1754 38.0392 36.2321 36.2837C38.2888 34.5282 39.6197 32.1028 39.9763 29.4605C40.0601 28.7925 39.9202 28.1161 39.5774 27.532C39.2347 26.9479 38.7074 26.4875 38.0743 26.2196ZM28.8002 35.88C22.0129 35.8727 15.5057 33.2407 10.7063 28.5613C5.90699 23.8819 3.20745 17.5374 3.20004 10.9197C3.19252 9.0155 3.89615 7.17372 5.17953 5.73833C6.46291 4.30294 8.23828 3.3721 10.1741 3.11964C10.1733 3.12742 10.1733 3.13525 10.1741 3.14304L14.3741 12.3081L10.2401 17.1325C10.1981 17.1795 10.16 17.2297 10.1261 17.2826C9.82512 17.7329 9.64856 18.2514 9.61352 18.7878C9.57847 19.3242 9.68614 19.8603 9.92609 20.3442C11.7381 23.9575 15.4721 27.5709 19.2182 29.3357C19.7181 29.5674 20.2711 29.6688 20.8233 29.6298C21.3754 29.5909 21.9077 29.4129 22.3682 29.1134C22.4195 29.0797 22.4689 29.0432 22.5162 29.0042L27.3782 24.9598L36.7783 29.0646C36.7783 29.0646 36.7943 29.0646 36.8003 29.0646C36.5445 30.9547 35.5912 32.6892 34.1188 33.9436C32.6463 35.198 30.7556 35.8864 28.8002 35.88Z"
                                        fill="black" />
                                </svg>
                                <p>021394829382</p>
                            </div>
                        </div>
                        <div class="font-['Poppins'] mx-16 w-1/4">
                            <h1 class="mb-5 text-2xl font-bold">Alamat Kami</h1>
                            <div class="flex gap-2">
                                <svg width="60" height="45" viewBox="0 0 40 49" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M20 10.5001C18.202 10.5001 16.4444 11.0133 14.9494 11.9748C13.4544 12.9362 12.2892 14.3028 11.6011 15.9017C10.913 17.5005 10.733 19.2599 11.0838 20.9573C11.4345 22.6546 12.3004 24.2137 13.5718 25.4374C14.8431 26.6612 16.463 27.4945 18.2265 27.8322C19.9899 28.1698 21.8178 27.9965 23.4789 27.3342C25.1401 26.6719 26.5599 25.5504 27.5588 24.1115C28.5577 22.6725 29.0909 20.9808 29.0909 19.2502C29.0909 16.9295 28.1331 14.7039 26.4282 13.0629C24.7234 11.422 22.4111 10.5001 20 10.5001ZM20 24.5002C18.9212 24.5002 17.8666 24.1923 16.9696 23.6155C16.0726 23.0386 15.3735 22.2186 14.9607 21.2593C14.5478 20.3 14.4398 19.2444 14.6503 18.226C14.8607 17.2075 15.3802 16.2721 16.1431 15.5378C16.9059 14.8036 17.8778 14.3036 18.9359 14.101C19.9939 13.8984 21.0907 14.0024 22.0874 14.3998C23.0841 14.7971 23.9359 15.4701 24.5353 16.3334C25.1346 17.1968 25.4545 18.2118 25.4545 19.2502C25.4545 20.6426 24.8799 21.978 23.8569 22.9625C22.834 23.9471 21.4466 24.5002 20 24.5002ZM20 0C14.6975 0.00578979 9.61393 2.03579 5.86451 5.64465C2.11508 9.2535 0.0060153 14.1465 0 19.2502C0 26.119 3.29773 33.3991 9.54545 40.3051C12.3528 43.4257 15.5124 46.2358 18.9659 48.6833C19.2716 48.8894 19.6358 49 20.0091 49C20.3823 49 20.7466 48.8894 21.0523 48.6833C24.4994 46.2348 27.6529 43.4247 30.4545 40.3051C36.6932 33.3991 40 26.119 40 19.2502C39.994 14.1465 37.8849 9.2535 34.1355 5.64465C30.3861 2.03579 25.3025 0.00578979 20 0ZM20 45.063C16.2432 42.2192 3.63636 31.7738 3.63636 19.2502C3.63636 15.073 5.36038 11.0669 8.42916 8.11315C11.4979 5.15942 15.6601 3.50004 20 3.50004C24.3399 3.50004 28.5021 5.15942 31.5708 8.11315C34.6396 11.0669 36.3636 15.073 36.3636 19.2502C36.3636 31.7694 23.7568 42.2192 20 45.063Z"
                                        fill="black" />
                                </svg>
                                <p>Menara Caraka - Jl. Mega Kuningan Barat, Kuningan, Kecamatan Setiabudi, Jakarta Selatan, DKI
                                    Jakarta 12950</p>
                            </div>
                        </div>
                        <div class="font-['Poppins']">
                            <h1 class="mb-5 text-2xl font-bold">Ikuti Kami</h1>
                            <div class="flex">
                                <a href="" class="object-cover w-16 h-16">
                                    <img height="50" width="50"
                                        src="{{ asset('assets/img/home-img/follow-img/instagram-logo.png')}}">
                                </a>
                                <a href="" class="object-cover w-16 h-16">
                                    <img height="50" width="50"
                                        src="{{ asset('assets/img/home-img/follow-img/facebook-logo.png')}}">
                                </a>
                                <a href="" class="object-cover w-16 h-16">
                                    <img height="50" width="50"
                                        src="{{ asset('assets/img/home-img/follow-img/tiktok-logo.png')}}">
                                </a>
                                <a href="" class="object-cover w-16 h-16">
                                    <img height="50" width="50"
                                        src="{{ asset('assets/img/home-img/follow-img/twitter-logo.png')}}">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <footer class="text-center text-stone-400">
                    <p>&copy; 2023 MyCuan</p>
                </footer>
</div>


</x-guest-layout>

