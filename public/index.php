<?php
session_start();
include '../lib/db.php';
include '../components/header.php';
include '../components/message.php';
?>
<h1>Willkommen bei Vanguard Rentals</h1>
<p>Bitte <a href='login.php'>einloggen</a> oder <a href='registrieren.php'>registrieren</a>.</p>
<?php include '../components/footer.php'; ?>
