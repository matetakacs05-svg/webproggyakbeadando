<?php
$host = "localhost";
$user = "forma12345";
$pass = "admin1234*";
$db   = "forma12345";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Hiba: " . $conn->connect_error);
}
?>