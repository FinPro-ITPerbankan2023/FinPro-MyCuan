<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Tentang Final Project

Project ini dibuat untuk memenuhi final project IT Perbankan yang diadakan oleh Rakamin Academy dengan tema **Peer-to-Peer Lending Yang Aman**, project ini memiliki fitur umum seperti:
1. Payment gateway untuk melakukan pembayaran.
2. Verifikasi pinjaman dan pembayaran secara manual oleh admin.
3. Pengajuan pinjaman.
4. Simpan data seperti identitas pengguna, bisnis/usaha, dan informasi detail lainnya.
5. Membayar cicilan sesuai dengan lama nya pinjaman (bayar sudah termasuk bunga 5%).

## System Requirement

Pada pengembangan project ini kami menggunakan software sebagai berikut:
- Laravel 10 atau lebih tinggi.
- PHP 8.1 atau lebih tinggi.
- MySQL 5.6 atau lebih tinggi.
- NodeJS 18 atau lebih tinggi.
- Composer 2.4.1.
- NPM 8 atau lebih tinggi.
- Laravel Jetstream.

## System Tambahan / Penunjang
- Midtrans Gateway Payment.
- AWS S3 untuk simpan foto.
- AWS EC2 untuk hosting aplikasi.

## Langkah Instalasi

1. Download zip pada project atau menggunakan
   ```
   git clone https://github.com/FinPro-ITPerbankan2023/FinPro-MyCuan
   ```
3. Buka folder project.
4. Buka _**powershell**_ atau _**cmd**_ untuk Window, atau _**terminal(konsole)**_.
5. Jalankan perintah
    ```
    npm install
    ```
   dan biarkan npm mendownload _**node_modules**_ yang dibutuhkan.
7. Jalankan perintah
   ```
   composer install
   ```
   dan biarkan composer mendownload _**vendor**_ yang dibutuhkan,
9. Kemudian _**copy paste**_ file **.env.example** menjadi **.env**, dan sesuaikan settingan pada database.
10. Jalankan perintah
    ```
    php artisan key:generate
    ```
12. Jalankan perintah
    ```
    php artisan migrate --seed
    ```
14. Jalankan perintah
    ```
    php artisan serve
    ```
16. Kemudian akses
    ```
    localhost:8000
    ```
10. (Optional) Jika UI mengalami masalah saat di akses, maka buka terminal baru lagi dan jalankan
    ```
    npm run build
    ```
    dan biarkan berjalan dilatar blakang.

## Kontributor Project

1. Alpin Apriliansyah (Project Manager) 
2. TanTamarine Myrna (UI/UX Design)
3. Eriyana Azhara (UI/UX Design)
4. Ikrar Bagaskara (Back End)
5. Mahindra Irvan S (Back End)
6. Alya Fitri Nurhaliza (Front End)
7. Rahayu Ningrum P (Front End)
8. Ufairah Damara (Front End)
9. M Irfansyah (Front End)

## License

Project in dibuat dibawah lisensi [MIT license](https://opensource.org/licenses/MIT).
