<?php
require __DIR__.'/../vendor/autoload.php';
use Kreait\Firebase\Factory;

$firebaseCredentials = getenv('FIREBASE_CREDENTIALS');
if (!$firebaseCredentials) {
    die("Firebase credentials not set.");
}
$serviceAccount = json_decode($firebaseCredentials, true);

$factory = (new Factory)->withServiceAccount($serviceAccount);
$auth = $factory->createAuth();
$database = $factory->createDatabase();

if (isset($_GET['email'])) {
    $email = $_GET['email'];

    try {
        // Ambil status terbaru dari Firebase Authentication
        $user = $auth->getUserByEmail($email);

        if ($user->emailVerified) {
            // Update status di Firebase Realtime Database menjadi true[cite: 6]
            $database->getReference('users/' . md5($email) . '/is_verified')->set(true);

            // Challenge Dosen: Auto-redirect langsung ke halaman login dengan status sukses
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