<?php
require __DIR__.'/../vendor/autoload.php';
use Kreait\Firebase\Factory;
use Kreait\Firebase\Auth;

// Ambil credentials dari environment variable
$firebaseCredentials = getenv('FIREBASE_CREDENTIALS');

if (!$firebaseCredentials) {
    die("Firebase credentials not set in environment variables.");
}

// Decode JSON credentials
$serviceAccount = json_decode($firebaseCredentials, true);

if (!$serviceAccount) {
    die("Invalid Firebase credentials.");
}

// Inisialisasi Firebase Auth dengan Environment Variable
$factory = (new Factory)->withServiceAccount($serviceAccount);
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