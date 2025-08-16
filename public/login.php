<?php
session_start();
require_once "../lib/db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'] ?? '';
    $pass = $_POST['password'] ?? '';

    $sql = "SELECT id, password FROM nutzer WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows === 1) {
        $stmt->bind_result($id, $hash);
        $stmt->fetch();
        if (password_verify($pass, $hash)) {
            $_SESSION['user_id'] = $id;
            $_SESSION['message'] = "Login erfolgreich!";
            header("Location: index.php");
            exit;
        }
    }
    $_SESSION['message'] = "Login fehlgeschlagen!";
    header("Location: login.php");
    exit;
}
?>
<form method="POST">
    <input type="email" name="email" required>
    <input type="password" name="password" required>
    <button type="submit">Einloggen</button>
</form>
<?php include '../components/message.php'; ?>
