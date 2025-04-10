# WisaTix — Web App Jual Tiket Wisata

![Laravel](https://img.shields.io/badge/Laravel-11-red?style=flat&logo=laravel)
![Filament](https://img.shields.io/badge/Filament-v3-blueviolet?style=flat&logo=laravel)
![MySQL](https://img.shields.io/badge/MySQL-Database-informational?style=flat&logo=mysql)

**WisaTix** adalah aplikasi penjualan tiket wisata berbasis web yang dibangun menggunakan **Laravel 11**, **Filament v3**, dan menerapkan **Service Repository Pattern**. Proyek ini merupakan bagian dari pembelajaran di kelas online:

> ** BWA -- Kelas Online — Laravel 11, Filament, Service Repository Pattern: Web Tiket**  

---

## 📚 Deskripsi Proyek

- Membuat ERD dan desain database
- Mengimplementasikan fitur autentikasi super admin
- Membuat dashboard dan CMS untuk mengelola konten
- Fitur pemesanan tiket, kategori, detail tiket, hingga transaksi pembayaran
- Mengintegrasikan Laravel Blade dengan controller

---

## 📚 Fitur Aplikasi

- 🔑 **Autentikasi User (Super Admin)**
- 📁 **Manajemen Tiket Wisata**:
  - Kategori Tiket
  - Detail Tiket
  - CMS Halaman Konten
- 🛒 **Pemesanan Tiket & Transaksi**
- ⏳ **Integrasi Metode Pembayaran**

---

## 🧠 Hal yang Dipelajari

- ✅ Membangun website jualan tiket online dari awal
- ✅ Menerapkan Service Repository Pattern dan prinsip MVC
- ✅ Menggunakan Filament PHP untuk membuat dashboard super admin dengan cepat
- ✅ Membuat fitur unggulan seperti booking dan pembayaran
- ✅ Membangun website cepat, aman, dan maintainable dengan Laravel 11

---

## 👨‍💻 Teknologi yang Digunakan

| Tech             | Keterangan                            |
|------------------|----------------------------------------|
| Laravel 11       | PHP Framework untuk Back-End           |
| Filament v3      | Admin Dashboard & CRUD Generator       |
| MySQL            | Database Relasional                    |
| Blade            | Templating Engine Laravel              |
| TailwindCSS      | Styling modern                         |
| Service Pattern  | Arsitektur bersih dan terstruktur      |

---

## 🚀 Cara Menjalankan Proyek

```bash
# Clone repository
https://github.com/Guruhg19/WisaTix---Web-App-Jual-Tiket.git

# Masuk ke folder proyek
cd WisaTix

# Install dependency
composer install

# Salin file environment dan generate key
cp .env.example .env
php artisan key:generate

# Setup database dan jalankan migration
php artisan migrate --seed

# Jalankan server lokal
php artisan serve
```

---

## 📝 Lisensi

Proyek ini dibuat sebagai bagian dari pembelajaran. Digunakan untuk portfolio dan dikembangkan lebih lanjut.

---

Happy building! 🚀  

