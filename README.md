# Play With Jesus - Tugas Sesi 9 (Firebase Authentication)

Aplikasi web edukasi interaktif berbasis PHP dengan implementasi sistem autentikasi menggunakan **Firebase Authentication**.

---

## Daftar Isi
1. [Tentang Proyek](#tentang-proyek)
2. [Fitur Utama (Firebase Authentication)](#fitur-utama-firebase-authentication)
3. [Keamanan Kredensial](#keamanan-kredensial)
4. [Tools & Perangkat Pembangunan](#tools--perangkat-pembangunan)

---

## Tentang Proyek
Pengembangan lanjutan dari aplikasi web **"Play With Jesus"** pada Sesi 9, yang berfokus pada penerapan sistem manajemen akun dan keamanan pengguna menggunakan layanan Cloud dari Firebase Authentication.

---

## Fitur Utama (Firebase Authentication)
Penerapan sistem manajemen akun pengguna menggunakan metode *Email/Password*:
* **Konfigurasi Firebase Console:** Mengaktifkan layanan *Authentication* dengan metode masuk *Email/Password*[cite: 4].
* **Registrasi Akun (`register.php`):**
  * Menggunakan fungsi pustaka Firebase `createUserWithEmailAndPassword($email, $password)` untuk mendaftarkan akun pengguna baru ke server Firebase[cite: 4].
  * Dilengkapi blok pengamanan `try-catch` untuk menangkap dan menampilkan pesan kesalahan (*error handling*) jika proses registrasi gagal[cite: 4].
* **Login Pengguna (`login.php`):**
  * Menggunakan fungsi pustaka Firebase `signInWithEmailAndPassword($email, $password)` untuk memverifikasi kredensial akun yang sudah terdaftar[cite: 4].
  * Dilengkapi blok `try-catch` untuk memastikan sistem dapat membedakan status login berhasil atau gagal secara responsif[cite: 4].

---

## Keamanan Kredensial
* File konfigurasi rahasia `firebase_credentials.json` disimpan secara terpisah di direktori *root* proyek[cite: 4].
* File kredensial telah didaftarkan ke dalam file `.gitignore` guna memastikan data sensitif aman dan tidak ikut terunggah ke repositori publik GitHub[cite: 4].

---

## Tools & Perangkat Pembangunan
* **Bahasa Pemrograman:** PHP
* **Layanan Cloud:** Firebase Authentication (`kreait/firebase-php`)
* **Antarmuka & Styling:** Bootstrap 5 (Responsive Layout & Pastel Theme)
* **Version Control:** Git & GitHub (Branch: `Tugas-Sesi-9`)
