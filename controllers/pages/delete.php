<?php
require_once __DIR__ . '/../../config/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = (int)$_POST['id'];

    try {
        $stmt = $conn->prepare("UPDATE pages SET isDeleted = 1 WHERE id = ?");
        $stmt->execute([$id]);
        header("Location: /dashboard/pages/"); // Pas aan naar jouw overzichtspagina
        exit;
    } catch (PDOException $e) {
        echo "Fout bij verwijderen: " . htmlspecialchars($e->getMessage());
        exit;
    }
}
?>
