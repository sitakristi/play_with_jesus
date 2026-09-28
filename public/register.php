<?php
require __DIR__.'/../vendor/autoload.php';
use Kreait\Firebase\Factory;
use Kreait\Firebase\Auth;

$factory = (new Factory)->withServiceAccount(__DIR__.'/../firebase_credentials.json');
$auth = $factory->createAuth();

$pesan = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    try {
        $user = $auth->createUserWithEmailAndPassword($email, $password);
        $pesan = "<div class='alert alert-success mt-3'>Registrasi berhasil! UID: " . $user->uid . "</div>";
    } catch (\Throwable $e) {
        $pesan = "<div class='alert alert-danger mt-3'>Registrasi gagal: " . $e->getMessage() . "</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Register - PlayWithJesus</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="py-5 d-flex align-items-center justify-content-center min-vh-100 bg-light">
    <div class="container" style="max-width: 500px;">
        <div class="card p-4 bg-white shadow-sm border-0">
            <h3 class="text-success fw-bold mb-4 text-center">Daftar Akun PlayWithJesus</h3>
            <?= $pesan ?>
            <form method="POST" action="" class="mt-3">
                <div class="mb-3">
                    <label for="register-email" class="form-label fw-semibold">Email</label>
                    <input type="email" id="register-email" name="email" class="form-control" required placeholder="Masukkan email...">
                </div>
                <div class="mb-4">
                    <label for="register-password" class="form-label fw-semibold">Password</label>
                    <input type="password" id="register-password" name="password" class="form-control" required minlength="6" placeholder="Minimal 6 karakter">
                </div>
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-success fw-bold">Register</button>
                    <a href="login.php" class="btn btn-outline-secondary btn-sm text-decoration-none">Sudah punya akun? Login di sini</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>