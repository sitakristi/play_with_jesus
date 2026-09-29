# Play With Jesus - Tugas AFL 2 (Cloud Computing)

Aplikasi web edukasi interaktif berbasis PHP dengan implementasi BaaS (Backend as a Service) menggunakan **Firebase Realtime Database**.

---

## Daftar Isi
1. [Tentang Proyek](#tentang-proyek)
2. [Fitur Utama (CRUD Realtime Database)](#fitur-utama-crud-realtime-database)
3. [Tools & Perangkat Pembangunan](#tools--perangkat-pembangunan)

---

## Tentang Proyek
Aplikasi web **"Play With Jesus"** dikembangkan untuk mengelola koleksi produk edukasi anak secara digital dengan memanfaatkan penyimpanan awan (*cloud storage*) dari Firebase Realtime Database.

---

## Fitur Utama (CRUD Realtime Database)
Sistem ini dirancang untuk menghubungkan aplikasi PHP dengan Firebase Realtime Database guna melakukan manajemen data secara *real-time*:
* **Create (`insert.php` & *form* tambah):** Menambahkan data koleksi produk edukasi baru (mencakup nama produk, kategori, harga, stok, dan kelengkapan) ke database.
* **Read (`index.php` / `view_data.php`):** Menampilkan daftar seluruh koleksi produk dalam bentuk tabel interaktif yang rapi dan terstruktur.
* **Update (`edit.php`):** Memperbarui atau mengubah informasi data produk yang sudah tersimpan di database[cite: 3].
* **Delete (`delete.php`):** Menghapus data produk dari database secara aman[cite: 3].

---

## Tools & Perangkat Pembangunan
* **Bahasa Pemrograman:** PHP
* **Layanan Cloud:** Firebase Realtime Database (`kreait/firebase-php`)
* **Antarmuka & Styling:** Bootstrap 5 (Responsive Layout & Pastel Theme)
* **Version Control:** Git & GitHub
