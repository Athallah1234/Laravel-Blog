# 📝 Blog Pribadi Laravel

Selamat datang di **Blog Pribadi Laravel**! 🚀  
Proyek ini adalah aplikasi blog modern berbasis **[Laravel](https://laravel.com/)** yang dirancang dengan performa tinggi, tampilan elegan, serta fitur-fitur lengkap untuk menulis, mengelola, dan berbagi artikel.

---

## ✨ Fitur Utama
- 🔐 **Autentikasi** (Register & Login kustom dengan keamanan tingkat tinggi)
- 📰 **Manajemen Artikel** (CRUD artikel dengan editor modern)
- 🏷️ **Kategori & Tag** untuk mengorganisir konten
- 💬 **Komentar** dengan validasi & moderasi
- 👤 **Profil Pengguna** (avatar, bio, dan cover profile)
- 🔍 **Pencarian Artikel** cepat & responsif
- 📱 **Desain Responsif** (mobile-friendly)
- 🌙 **Mode Gelap & Terang** untuk kenyamanan membaca
- 💸 **Fitur Donasi** (opsional untuk dukungan pembaca)

---

## 🚀 Teknologi yang Digunakan
- **Backend**: [Laravel 10+](https://laravel.com/)
- **Frontend**: [Bootstrap 5](https://getbootstrap.com/) & [Blade Templating](https://laravel.com/docs/blade)
- **Database**: MySQL / MariaDB
- **Authentication**: Custom Auth
- **Deployment**: Apache

---

## 📦 Instalasi & Setup
```bash
# Clone repository
git clone https://github.com/username/blog-laravel.git

# Masuk ke folder project
cd blog-laravel

# Install dependencies
composer install
npm install && npm run build

# Copy file environment
cp .env.example .env

# Generate app key
php artisan key:generate

# Migrasi database
php artisan migrate --seed

# Jalankan server
php artisan serve
```

---

## Kontribusi

Pull request sangat diterima!
Jika menemukan bug atau memiliki ide fitur baru silakan buat issue terlebih dahulu.

---
