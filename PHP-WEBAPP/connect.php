<?php

$host = 'localhost';                
$dbname = 'your_db_name';           // placeholder to omit
$username = 'your_db_user';         // omitted
$password = 'your_db_password';     // omitted

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    error_log("Database connection failed: " . $e->getMessage());
    die("Connection failed.");   
}
?>
