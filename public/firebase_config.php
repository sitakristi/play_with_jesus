<?php
require __DIR__.'/../vendor/autoload.php';

use Kreait\Firebase\Factory;

$databaseUri = 'https://tugas-afl2-playwithjesus-admin-default-rtdb.asia-southeast1.firebasedatabase.app/'; 

$factory = (new Factory)
    ->withServiceAccount(__DIR__.'/../firebase_credentials.json')
    ->withDatabaseUri($databaseUri);

$database = $factory->createDatabase();
?>