# PlayWithJesus - Authentication & Webmailer System

Proyek ini merupakan kelanjutan dari Assignment Sesi 10, dengan fokus pada penguatan sistem autentikasi menggunakan Firebase Auth, Realtime Database, dan Kreait SDK.

**Fitur Utama (Pembaruan Sesi 11):**
* **Email Verification:** Sistem otomatis mengirimkan tautan verifikasi menggunakan Webmailer saat pengguna baru mendaftar.
* **Login Protection:** Akses login ditolak secara otomatis jika status pengguna di database masih `is_verified = false`.
* **Auto-Redirect:** Pengguna langsung diarahkan ke halaman login setelah berhasil memverifikasi email melalui tautan.
* **Error Handling:** Sistem menangkap *error* dari Firebase dan menampilkannya sebagai pesan yang ramah pengguna (contoh: peringatan salah kata sandi atau akun tidak ditemukan).

**Demo Account (Untuk Keperluan Penilaian Sesi 11):**
* Email: demo@gmail.com
* Password: DemoPassword123
* Role: Admin