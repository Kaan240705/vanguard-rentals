<?php
$host = "db"; $user = "appuser"; $pass = "appsecret"; $dbname = "vanguard_rentals";
$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) die("Verbindung fehlgeschlagen: " . $conn->connect_error);
?>
