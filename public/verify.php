<?php
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

if (isset($_GET['email'])) {
    $email = $_GET['email'];

    try {
        $user = $auth->getUserByEmail($email);

        if ($user->emailVerified) {
            // Update status di Firebase Realtime Database
            $database->getReference('users/' . md5($email) . '/is_verified')->set(true);

            // Auto-redirect ke halaman login
            header("Location: login.php?status=verified");
            exit();
        } else {
            echo "<script>alert('Email belum diverifikasi. Silakan klik link di email Anda.'); window.location.href='login.php';</script>";
        }
    } catch (\Kreait\Firebase\Exception\AuthException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Email tidak ditemukan pada parameter URL.";
}
?>