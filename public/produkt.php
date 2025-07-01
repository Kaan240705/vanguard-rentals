<?php
session_start();
include '../lib/db.php';
include '../components/header.php';
echo "<h2>Verfügbare Produkte</h2>";
$result = $conn->query("SELECT * FROM produkte");
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div><strong>{$row['name']}</strong> – {$row['beschreibung']} ({$row['preis']} €)</div>";
    }
} else {
    echo "<p>Keine Produkte verfügbar.</p>";
}
include '../components/footer.php';
?>
