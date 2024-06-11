<?php
// config.php
$config = [
    'host' => 'postgres',
    'port' => '5432',
    'database' => getenv("POSTGRES_DB"),
    'user' => getenv("POSTGRES_USER"),
    'password' => getenv("POSTGRES_PASSWORD"),
];
?>
