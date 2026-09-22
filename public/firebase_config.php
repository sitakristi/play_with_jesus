<?php
require __DIR__.'/../vendor/autoload.php';

use Kreait\Firebase\Factory;

// Ganti URL di bawah ini dengan Database URI milikmu!
$databaseUri = 'https://tugas-afl2-playwithjesus-admin-default-rtdb.asia-southeast1.firebasedatabase.app/'; 

$factory = (new Factory)
    ->withServiceAccount(__DIR__.'/../src/firebase_credentials.json')
    ->withDatabaseUri($databaseUri);

$database = $factory->createDatabase();
?>