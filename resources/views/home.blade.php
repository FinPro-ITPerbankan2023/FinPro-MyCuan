@section('title', 'MyCuan')

<x-guest-layout>
    <div class="h-auto bg-gradient-to-bl from-[#13a89e] to-white-700 dark:text-black">
        <nav>
            <div class="flex px-10 py-5 mx-auto ">
                <div class="flex flex-row items-center justify-center  grow-0 w-52">
                    <a href="{{ url('/')}}"><img src="{{asset('assets/img/Logo_MyCuan.png')}}" alt="Logo MyCuan"
                            class="w-20 h-20"></a>
                    <a href="{{ url('/')}}">
                        <p class="ml-6 text-2xl text-black font-poppins">MyCuan</p>
                    </a>
                </div>
                <div class="flex items-center justify-center grow font-poppins">
                    <a href="#persyaratan" class="mx-5 hover:text-white">Persyaratan Peminjaman</a>
                    <a href="#tentang" class="mx-5 hover:text-white">Tentang Kami</a>
                    <a href="#kontak" class="mx-5 hover:text-white">Kontak</a>
                </div>
                @if (Route::has('login'))
                    <div class="flex items-center justify-center ml-96 relative">
                        @auth
                            @php
                                $dashboardRoute = match(auth()->user()->role_id) {
                                    1 => '/lender',
                                    2 => '/borrower',
                                    3 => '/admin',
                                };
                            @endphp

                            <a href="{{ url($dashboardRoute) }}" class="block w-48">
                                <button id="dashboardBtn"
                                        class="font-['Poppins'] inline-block rounded bg-[#186f65] px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] w-full">
                                    Dashboard
                                </button>
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="block w-48">
                                <button id="dashboardBtn"
                                        class="font-['Poppins'] inline-block rounded bg-[#186f65] px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] w-full">
                                    MASUK
                                </button>
                            </a>
                        @endauth
                    </div>
                @endif


            </div>
        </nav>
        <div class="h-screen mt-24">
            <div class="text-center text-xl font-bold font-['Poppins'] py-5">
                <h1>
                    Jalani Hidup Tanpa Batasan, Dengan Bantuan My Cuan.
                </h1>
            </div>
            <div class="max-w-4xl pt-5 mx-auto sliderAx">
                <div id="slider-1" class="container mx-auto">
                    <div class="object-fill px-10 py-40 text-white bg-center bg-cover h-52"
                        style="background-image: url('assets/img/home-img/slider-img/slider-img-1.jpg')">
                    </div>
                    <!-- container -->
                    <br>
                </div>
                <div id="slider-2" class="container mx-auto">
                    <div class="object-fill h-auto px-10 py-40 text-white bg-center bg-cover"
                        style="background-image: url('assets/img/home-img/slider-img/slider-img-2.jpg')">
                    </div>
                    <!-- container -->
                    <br>
                </div>
                <div id="slider-3" class="container mx-auto">
                    <div class="object-fill h-auto px-10 py-40 text-white bg-center bg-cover"
                        style="background-image: url('assets/img/home-img/slider-img/slider-img-3.jpg')">
                    </div>
                    <!-- container -->
                    <br>
                </div>
                <div id="slider-4" class="container mx-auto">
                    <div class="object-fill h-auto px-10 py-40 text-white bg-center bg-cover"
                        style="background-image: url('assets/img/home-img/slider-img/slider-img-4.jpg')">
                    </div>
                    <!-- container -->
                    <br>
                </div>
            </div>
            <div class="flex justify-between w-20 pb-2 mx-auto">
                <button id="sButton1" onclick="sliderButton(0)"
                    class="w-4 pb-2 rounded-full slider-button bg-slate-300 "></button>
                <button id="sButton2" onclick="sliderButton(1)"
                    class="w-4 p-2 rounded-full slider-button bg-slate-300"></button>
                <button id="sButton3" onclick="sliderButton(2)"
                    class="w-4 p-2 rounded-full slider-button bg-slate-300"></button>
                <button id="sButton4" onclick="sliderButton(3)"
                    class="w-4 p-2 rounded-full slider-button bg-slate-300"></button>
            </div>
            <div class="text-center text-xl font-bold font-['Poppins'] py-5">
                <h1>
                    Memberikan Dana untuk Membantu UMKM
                </h1>
            </div>
        </div>
        <div class="h-auto">
            <div class="text-center text-6xl font-bold font-['Poppins'] py-5" id="persyaratan">
                <h1>
                    Persyaratan Peminjaman
                </h1>
            </div>
            <div class="mx-40">
                <div class="grid grid-cols-2 justify-items-center">
                    <div class="object-cover w-4/5 h-4/5">
                        <img src="{{ asset('assets/img/home-img/persyaratan-peminjaman/img-1.png')}}">
                    </div>
                    <div class="self-center">
                        <h1 class="font-['Poppins'] font-bold text-2xl">Memiliki Usaha atau Bisnis</h1>
                        <p class="font-['Poppins']">Untuk memenuhi syarat peminjaman, Anda perlu memiliki atau
                            mengoperasikan usaha atau bisnis. Anda harus memiliki entitas usaha yang sah dan aktif.</p>
                    </div>
                    <div class="self-center">
                        <h1 class="font-['Poppins'] font-bold text-2xl">Memiliki Surat Izin Usaha</h1>
                        <p class="font-['Poppins']">Surat izin usaha ini berfungsi sebagai bukti bahwa usaha Anda
                            beroperasi secara legal dan sesuai dengan regulasi yang berlaku.</p>
                    </div>
                    <div class="object-cover w-3/5 h-3/5">
                        <img src="{{ asset('assets/img/home-img/persyaratan-peminjaman/img-2.png')}}">
                    </div>
                    <div class="object-cover w-3/5 h-3/5">
                        <img src="{{ asset('assets/img/home-img/persyaratan-peminjaman/img-3.png')}}">
                    </div>
                    <div class="self-center">
                        <h1 class="font-['Poppins'] font-bold text-2xl">Warga Negara Indonesia</h1>
                        <p class="font-['Poppins']">Anda harus menjadi warga negara Indonesia agar memenuhi syarat untuk
                            mengajukan peminjaman.</p>
                    </div>
                    <div class="self-center">
                        <h1 class="font-['Poppins'] font-bold text-2xl">Batas Usia</h1>
                        <p class="font-['Poppins']">Calon peminjam harus berusia minimal 20 tahun dan tidak lebih dari
                            60 tahun saat mengajukan pinjaman.</p>
                    </div>
                    <div class="object-cover w-3/5 h-3/5">
                        <img src="{{ asset('assets/img/home-img/persyaratan-peminjaman/img-4.png')}}">
                    </div>
                    <div class="object-cover w-3/5 h-3/5">
                        <img src="{{ asset('assets/img/home-img/persyaratan-peminjaman/img-5.png')}}">
                    </div>
                    <div class="self-center">
                        <h1 class="font-['Poppins'] font-bold text-2xl">Slip Gaji atau Bukti Penghasilan</h1>
                        <p class="font-['Poppins']">Menyediakan bukti penghasilan dalam bentuk slip gaji atau dokumen
                            lain yang menunjukkan kemampuan keuangan untuk melunasi pinjaman. Ini digunakan sebagai
                            jaminan pembayaran.</p>
                    </div>
                </div>
            </div>

        </div>
        <div class="flex flex-col h-auto mx-20 my-36">
            <div class="text-center text-6xl font-bold font-['Poppins'] my-12" id="tentang">
                <h1>Tentang Kami</h1>
            </div>
            <div class="flex items-center justify-center gap-16 px-20 my-20">
                <img src="{{ asset('assets/img/Logo_MyCuan.png')}}" class="object-cover h-80 w-80">
                <p class="self-center font-['Poppins'] text-2xl w-2/4">MyCuan adalah sebuah platform pinjam meminjam
                    uang berbasis teknologi informasi yang menghubungkan peminjam dan pendana secara langsung. Kami
                    menawarkan kemudahan, kecepatan, dan kenyamanan bagi para peminjam yang membutuhkan dana tunai untuk
                    keperluan modal usaha, Kami juga memberikan kesempatan bagi para pendana yang ingin mendapatkan
                    pengembalian investasi yang menarik dan berisiko rendah.</p>
            </div>
        </div>
        <div class="h-screen mx-36" id="kontak">
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
        <footer class="text-center">
            <p>&copy; 2023 MyCuan</p>
        </footer>
    </div>
    <script>
        var cont = 0;
        var xx;

        function loopSlider() {
            xx = setInterval(function () {
                switch (cont) {
                    case 0:
                        $("#slider-1").fadeOut(400);
                        $("#slider-2").delay(400).fadeIn(400);
                        setActiveButton(1);
                        cont = 1;
                        break;
                    case 1:
                        $("#slider-2").fadeOut(400);
                        $("#slider-3").delay(400).fadeIn(400);
                        setActiveButton(2);
                        cont = 2;
                        break;
                    case 2:
                        $("#slider-3").fadeOut(400);
                        $("#slider-4").delay(400).fadeIn(400);
                        setActiveButton(3);
                        cont = 3;
                        break;
                    case 3:
                        $("#slider-4").fadeOut(400);
                        $("#slider-1").delay(400).fadeIn(400);
                        setActiveButton(0);
                        cont = 0;
                        break;
                }
            }, 8000);
        }

        function reinitLoop(time) {
            clearInterval(xx);
            setTimeout(loopSlider(), time);
        }

        function sliderButton(buttonIndex) {
            // Hentikan loop saat tombol slider ditekan
            clearInterval(xx);
            cont = buttonIndex;
            setActiveButton(cont);
            switch (cont) {
                case 0:
                    $("#slider-1").show();
                    $("#slider-2").hide();
                    $("#slider-3").hide();
                    $("#slider-4").hide();
                    break;
                case 1:
                    $("#slider-1").hide();
                    $("#slider-2").show();
                    $("#slider-3").hide();
                    $("#slider-4").hide();
                    break;
                case 2:
                    $("#slider-1").hide();
                    $("#slider-2").hide();
                    $("#slider-3").show();
                    $("#slider-4").hide();
                    break;
                case 3:
                    $("#slider-1").hide();
                    $("#slider-2").hide();
                    $("#slider-3").hide();
                    $("#slider-4").show();
                    break;
            }
            // Jalankan loop kembali setelah 8 detik
            reinitLoop(8000);
        }

        function setActiveButton(activeIndex) {
            for (var i = 1; i <= 4; i++) {
                if (i === activeIndex + 1) {
                    $("#sButton" + i).addClass("bg-slate-800");
                } else {
                    $("#sButton" + i).removeClass("bg-slate-800");
                }
            }
        }

        $(window).ready(function () {
            // Sembunyikan slider 2, 3, dan 4 saat halaman dimuat
            $("#slider-2").hide();
            $("#slider-3").hide();
            $("#slider-4").hide();
            // Tandai tombol pertama sebagai aktif saat halaman dimuat
            setActiveButton(0);
            // Jalankan loop slider
            loopSlider();
        });

    </script>

</x-guest-layout>
