<?php
session_start();
require_once "../lib/db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'] ?? '';
    $pass = $_POST['password'] ?? '';

    $hash = password_hash($pass, PASSWORD_DEFAULT);
    $sql = "INSERT INTO nutzer (email, passwort) VALUES (?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $email, $hash);
    if ($stmt->execute()) {
        $_SESSION['message'] = "Registrierung erfolgreich!";
        header("Location: login.php");
        exit;
    } else {
        $_SESSION['message'] = "Fehler: E-Mail evtl. schon registriert.";
        header("Location: registrieren.php");
        exit;
    }
}
?>
<form method="POST">
    <input type="email" name="email" required>
    <input type="password" name="password" required>
    <button type="submit">Registrieren</button>
</form>
<?php include '../components/message.php'; ?>
