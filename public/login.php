<?php
session_start();
require __DIR__.'/../vendor/autoload.php';
use Kreait\Firebase\Factory;

$firebaseCredentials = getenv('FIREBASE_CREDENTIALS');
if (!$firebaseCredentials) {
    die("Firebase credentials not set.");
}
$serviceAccount = json_decode($firebaseCredentials, true);

// Tambahkan URI Database
$factory = (new Factory)
    ->withServiceAccount($serviceAccount)
    ->withDatabaseUri('https://tugas-afl2-playwithjesus-admin-default-rtdb.asia-southeast1.firebasedatabase.app/');
    
$auth = $factory->createAuth();
$database = $factory->createDatabase();

$pesan = "";

if (isset($_GET['status']) && $_GET['status'] === 'verified') {
    $pesan = "<div class='alert alert-success mt-3'>Email berhasil diverifikasi! Silakan login.</div>";
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST["email"];
    $password = $_POST["password"];

    try {
        // Cek email & password
        $signInResult = $auth->signInWithEmailAndPassword($email, $password);
        $userAuth = $auth->getUserByEmail($email);

        // Ambil data verifikasi dari Realtime Database menggunakan md5
        $userData = $database->getReference('users/' . md5($email))->getValue();

        if ($userAuth->emailVerified && $userData && isset($userData['is_verified']) && $userData['is_verified'] == true) {
            $_SESSION['user_id'] = $signInResult->firebaseUserId();
            $_SESSION['user_email'] = $email;
            
            header("Location: index.php");
            exit();
        } else {
            $pesan = "<div class='alert alert-warning mt-3'>Akun belum diverifikasi. Silakan cek email Anda.</div>";
        }

    } catch (\Kreait\Firebase\Exception\Auth\InvalidPassword $e) {
        $pesan = "<div class='alert alert-danger mt-3'>Email atau password salah.</div>";
    } catch (\Kreait\Firebase\Exception\Auth\UserNotFound $e) {
        $pesan = "<div class='alert alert-danger mt-3'>Akun tidak ditemukan. Silakan registrasi terlebih dahulu.</div>";
    } catch (\Kreait\Firebase\Exception\AuthException $e) {
        $errorMsg = $e->getMessage();
        if (strpos(strtoupper($errorMsg), 'INVALID_LOGIN_CREDENTIALS') !== false) {
            $pesan = "<div class='alert alert-danger mt-3'>Email atau password salah.</div>";
        } else {
            $pesan = "<div class='alert alert-danger mt-3'>Error: " . $errorMsg . "</div>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login - PlayWithJesus</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="py-5 d-flex align-items-center justify-content-center min-vh-100 bg-light">
<div class="container" style="max-width: 500px;">
    <div class="card p-4 bg-white shadow-sm border-0">
        <h3 class="text-success fw-bold mb-4 text-center">Login PlayWithJesus</h3>
        <?= $pesan ?>
        <form method="POST" action="" class="mt-3">
            <div class="mb-3">
                <label for="login-email" class="form-label fw-semibold">Email</label>
                <input type="email" id="login-email" name="email" class="form-control" required placeholder="Masukkan email...">
            </div>
            <div class="mb-4">
                <label for="login-password" class="form-label fw-semibold">Password</label>
                <input type="password" id="login-password" name="password" class="form-control" required placeholder="Masukkan password...">
            </div>
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-success fw-bold">Login</button>
                <a href="register.php" class="btn btn-outline-secondary btn-sm text-decoration-none">Belum punya akun? Daftar di sini</a>
            </div>
        </form>
    </div>
</div>
</body>
</html>