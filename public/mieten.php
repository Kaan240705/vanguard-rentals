<?php
session_start();
include '../lib/db.php';
include '../components/header.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $produkt_id = $_POST['produkt_id'] ?? '';
    $nutzer_id = $_SESSION['user_id'] ?? null;

    if ($nutzer_id && $produkt_id) {
        $stmt = $conn->prepare("INSERT INTO bestellungen (nutzer_id, produkt_id, datum) VALUES (?, ?, NOW())");
        $stmt->bind_param("ii", $nutzer_id, $produkt_id);
        if ($stmt->execute()) {
            $_SESSION['message'] = "Produkt erfolgreich gemietet!";
        } else {
            $_SESSION['message'] = "Fehler bei der Bestellung.";
        }
        header("Location: mieten.php");
        exit;
    } else {
        $_SESSION['message'] = "Bitte zuerst einloggen.";
        header("Location: login.php");
        exit;
    }
}
?>

<h2>Produkt mieten</h2>
<form method="POST">
    <label>Produkt-ID: <input type="number" name="produkt_id" required></label>
    <button type="submit">Mieten</button>
</form>
<?php include '../components/message.php'; ?>
<?php include '../components/footer.php'; ?>
