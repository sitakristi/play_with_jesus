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
        // Ambil data user dari Auth
        $user = $auth->getUserByEmail($email);
        
        if ($user->emailVerified) {
            // Update status is_verified menjadi true di Realtime Database
            $database->getReference('users/' . md5($email) . '/is_verified')->set(true);
            
            // Challenge: Auto Redirect ke halaman Login
            header("Location: login.php?status=verified");
            exit();
        } else {
            echo "<h3>Email belum diverifikasi. Silakan klik link yang ada di email Anda.</h3>";
        }
    } catch (\Kreait\Firebase\Exception\AuthException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Email tidak ditemukan pada parameter URL.";
}
?>