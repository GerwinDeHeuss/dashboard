<?php
require_once __DIR__ . '/../../config/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = (int)$_POST['id'];

    try {
        // Controleer of widget in gebruik is op pagina's
        $checkStmt = $conn->prepare("SELECT COUNT(*) FROM pagewidgets WHERE widget_id = ?");
        $checkStmt->execute([$id]);
        $inUse = $checkStmt->fetchColumn() > 0;

        if ($inUse) {
            $_SESSION['error_message'] = 'Deze widget kan niet worden verwijderd omdat deze nog in gebruik is op één of meer pagina\'s.';
            header("Location: " . $_SERVER['HTTP_REFERER']);
            exit;
        }

        // Widget is niet in gebruik, verwijder deze
        $stmt = $conn->prepare("DELETE FROM widget WHERE id = ?");
        $stmt->execute([$id]);
        
        $_SESSION['success_message'] = 'Widget succesvol verwijderd.';
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit;
    } catch (PDOException $e) {
        $_SESSION['error_message'] = 'Fout bij verwijderen: ' . $e->getMessage();
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit;
    }
}
?>