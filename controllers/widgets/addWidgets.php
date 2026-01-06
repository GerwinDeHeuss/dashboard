<?php

require_once __DIR__ . '/../../config/config.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_widget'])) {

    
    $title = trim($_POST['title']);
    $description = trim($_POST['description']);
    $text = trim($_POST['text']);

    $created_at = date('Y-m-d');
    $last_edit = date('Y-m-d');

    if ($title) {
        // Voeg toe aan WidgetContent
        $stmt = $conn->prepare("INSERT INTO widgetcontent (title, description, text) VALUES (?, ?, ?)");
        $stmt->execute([$title, $description, $text]);

        $widgetcontent_id = $conn->lastInsertId();

        // Voeg daarna toe aan pages
        $stmt2 = $conn->prepare("INSERT INTO widget (created_at, last_edit, widgetcontent_id) VALUES (?, ?, ?)");
        $stmt2->execute([$created_at, $last_edit, $widgetcontent_id]);

        // Redirect om dubbel submitten te voorkomen
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }
}
