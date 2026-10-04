# PlayWithJesus - Authentication & Webmailer System

Proyek ini merupakan kelanjutan dari Assignment Sesi 10, dengan fokus pada penguatan sistem autentikasi menggunakan Firebase Auth, Realtime Database, dan Kreait SDK.

**Fitur Utama (Pembaruan Sesi 11):**
* **Email Verification:** Sistem otomatis mengirimkan tautan verifikasi menggunakan Webmailer saat pengguna baru mendaftar.
* **Login Protection:** Akses login ditolak secara otomatis jika status pengguna di database masih `is_verified = false`.
* **Auto-Redirect:** Pengguna langsung diarahkan ke halaman login setelah berhasil memverifikasi email melalui tautan.
* **Error Handling:** Sistem menangkap *error* dari Firebase dan menampilkannya sebagai pesan yang ramah pengguna (contoh: peringatan salah kata sandi atau akun tidak ditemukan).

**Demo Account (Untuk Keperluan Penilaian Sesi 11):**
* **Email:** ronayox254@aminavin.com
* **Password:** DemoPassword123

---
**Catatan Implementasi Tambahan:**
Sesuai instruksi, saya telah berupaya melakukan kustomisasi pada *Email Template* (mengubah *Sender Name* dan *Subject*) melalui Firebase Console. Namun, berdasarkan pembaruan kebijakan keamanan dari Google Firebase untuk paket Spark (gratis), fitur pembaruan template saat ini dikunci secara global ("*Email template updates are currently unavailable for this project*") untuk mencegah penyalahgunaan *spam/phishing*. Oleh karena itu, email verifikasi yang terkirim tetap menggunakan format dan domain bawaan dari Firebase, tetapi secara fungsi alur verifikasi sudah berjalan 100% dengan baik.
