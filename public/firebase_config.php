<?php
require __DIR__.'/../vendor/autoload.php';

use Kreait\Firebase\Factory;

$databaseUri = 'https://tugas-afl2-playwithjesus-admin-default-rtdb.asia-southeast1.firebasedatabase.app/'; 

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

// Konfigurasi Firebase menggunakan variabel Environment
$factory = (new Factory)
    ->withServiceAccount($serviceAccount)
    ->withDatabaseUri($databaseUri);

$database = $factory->createDatabase();
?>