<?php
session_start();
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

// Inisialisasi Firebase Auth
$factory = (new Factory)->withServiceAccount($serviceAccount);
$auth = $factory->createAuth();

$pesan = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    try {
        $signInResult = $auth->signInWithEmailAndPassword($email, $password);
        
        // Simpan data user ke dalam session
        $_SESSION['user_id'] = $signInResult->firebaseUserId();
        
        // Arahkan langsung ke halaman CRUD
        header("Location: index.php"); 
        exit();
    } catch (\Throwable $e) {
        $pesan = "<div class='alert alert-danger mt-3'>Login failed: " . $e->getMessage() . "</div>";
    }
}
?>