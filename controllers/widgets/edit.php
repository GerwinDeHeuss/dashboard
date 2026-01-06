<?php

require_once __DIR__ . '/../../config/config.php';

$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['save_widget'])) {
    $id = $_POST['id'] ?? null;
    $title = $_POST['title'] ?? '';
    $description = $_POST['description'] ?? '';
    $text = $_POST['text'] ?? '';
    $contentId = $_POST['id'] ?? null;
    $widgetId = $_GET['id'] ?? null;

    if (!$id || !$title) {
        echo "Ongeldige invoer.";
        exit;
    }

    try {
        // Update widgetcontent
        $stmt = $conn->prepare("UPDATE widgetcontent SET title = ?, description = ?, text = ? WHERE id = ?");
        $stmt->execute([$title, $description, $text, $contentId]);

        // Update last_edit datum
        $stmt = $conn->prepare("UPDATE widget SET last_edit = ? WHERE id = ?");
        $stmt->execute([date('Y-m-d'), $widgetId]);

        $_SESSION['success_message'] = 'Widget succesvol opgeslagen.';
        header("Location: " . $_SERVER['REQUEST_URI']);
        exit;

    } catch (PDOException $e) {
        echo "Er is iets fout gegaan bij het updaten: " . htmlspecialchars($e->getMessage());
        exit;
    }
}

// Haal widget data op
$stmt = $conn->prepare("
    SELECT widget.*, widgetcontent.title AS title, widgetcontent.description AS description, 
           widgetcontent.text AS text, widgetcontent.id AS content_id
    FROM widget
    INNER JOIN widgetcontent ON widget.widgetcontent_id = widgetcontent.id
    WHERE widget.id = :id
");
$stmt->execute(['id' => $id]);
$widget = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$widget) {
    echo "Widget niet gevonden.";
    exit;
}

?>