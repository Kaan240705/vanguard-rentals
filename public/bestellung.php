<?php
session_start();
include '../lib/db.php';
include '../components/header.php';

$user_id = $_SESSION['user_id'] ?? null;
echo "<h2>Meine Bestellungen</h2>";

if ($user_id) {
    $stmt = $conn->prepare("SELECT b.id, p.name, b.datum FROM bestellungen b JOIN produkte p ON b.produkt_id = p.id WHERE b.nutzer_id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        echo "<div>Bestellung: {$row['name']} am {$row['date']}</div>";
    }

    if ($result->num_rows == 0) {
        echo "<p>Keine Bestellungen gefunden.</p>";
    }
} else {
    echo "<p>Bitte zuerst einloggen.</p>";
}

include '../components/footer.php';
?>
