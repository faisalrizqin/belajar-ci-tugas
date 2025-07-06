# Toko Online CodeIgniter 4

Proyek ini adalah platform toko online yang dibangun menggunakan [CodeIgniter 4](https://codeigniter.com/). Sistem ini menyediakan beberapa fungsionalitas untuk toko online, termasuk manajemen produk, keranjang belanja, dan sistem transaksi.

## Daftar Isi

- [Fitur](#fitur)
- [Persyaratan Sistem](#persyaratan-sistem)
- [Instalasi](#instalasi)
- [Struktur Proyek](#struktur-proyek)

## Fitur

- Katalog Produk
  - Tampilan produk dengan gambar
  - Pencarian produk
- Keranjang Belanja
  - Tambah/hapus produk
  - Update jumlah produk
- Sistem Transaksi
  - Proses checkout
  - Riwayat transaksi
  - Hitung ongkir otomatis
  - Detail transaksi per item
  - Potong harga dengan diskon
- Panel Admin
  - Manajemen produk (CRUD)
  - Manajemen kategori
  - Laporan transaksi
  - Export data ke PDF
  - Atur data diskon
- Sistem Autentikasi
  - Login/Register pengguna
  - Manajemen akun
- UI Responsif dengan NiceAdmin template
- Webservice API  
  - Tampilkan data transaksi  
  - Total dan jumlah item dibeli  

## Persyaratan Sistem

- PHP >= 8.2
- Composer
- Web server (XAMPP)

## Instalasi

1. **Clone repository ini**
   ```bash
   git clone [URL repository]
   cd belajar-ci-tugas
   ```
2. **Install dependensi**
   ```bash
   composer install
   ```
3. **Install library eksternal**
  ```bash
   composer require guzzlehttp/guzzle
   ```
4. **Konfigurasi environment**

   - Start module Apache dan MySQL pada XAMPP
   - Buat database **db_ci4** di phpmyadmin.
   - copy file .env dari tutorial https://www.notion.so/april-ns/Codeigniter4-Migration-dan-Seeding-045ffe5f44904e5c88633b2deae724d2
   - Tambahkan di file env:
    COST_KEY = api_key_rajaongkir_anda
    API_KEY = random123678abcghi (diisi bebas)

5. **Jalankan migrasi database**
   ```bash
   php spark migrate
   ```
6. **Seeder data**
   ```bash
   php spark db:seed ProductSeeder
   ```
   ```bash
   php spark db:seed UserSeeder
   ```
7. **Jalankan server**
   ```bash
   php spark serve
   ```
8. **Akses aplikasi**
   Buka browser dan akses `http://localhost:8080` untuk melihat aplikasi.

## Struktur Proyek

Proyek menggunakan struktur MVC CodeIgniter 4:

- app/Controllers - Logika aplikasi dan penanganan request
  - AuthController.php - Autentikasi pengguna
  - ProdukController.php - Manajemen produk
  - TransaksiController.php - Proses transaksi
  - Home.php – Halaman utama dan profil pengguna
  - ApiController.php – Webservice API transaksi
- app/Models - Model untuk interaksi database
  - ProductModel.php - Model produk
  - UserModel.php - Model pengguna
  - ProductCategoryModel.php - Model kategori produk
  - TransactionModel.php – Model transaksi utama
  - TransactionDetailModel.php – Model detail transaksi
  - DiskonModel.php – Model data diskon
- app/Views - Template dan komponen UI
  - v_produk.php - Tampilan produk
  - v_keranjang.php - Halaman keranjang
  - v_checkout.php – Formulir checkout dan ongkir
  - v_profile.php – Riwayat transaksi
  - v_diskon.php – Kelola diskon harian
  - v_login.php - Halaman login
  - v_home.php - Tampilan home
  - v_kategori-produk.php - Kelola kategori produk
  - v_produkPDF.php - Tampilan pdf download data produk
  - layout.php - Template utama
  - layout_clear.php - Layout clear untuk halaman login
- public/img - Gambar produk dan aset
- public/NiceAdmin - Template admin
- public/index.php – Dashboard webservice transaksi
