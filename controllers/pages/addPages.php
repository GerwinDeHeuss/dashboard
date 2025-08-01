<?php

require_once __DIR__ . '/../../config/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_page'])) {
    $title = trim($_POST['title']);
    $template_id = intval($_POST['template_id']);

    // Maak nette URL
    $url = strtolower(trim($title));
    $url = preg_replace('/[^a-z0-9\s-]/', '', $url);
    $url = preg_replace('/[\s-]+/', '-', $url);

    $created_at = date('Y-m-d');

    if ($title && $template_id) {
        // Voeg eerst toe aan PageContent
        $stmt1 = $conn->prepare("INSERT INTO PageContent (title, description) VALUES (?, '')");
        $stmt1->execute([$title]);

        $pagecontent_id = $conn->lastInsertId();

        // Voeg daarna toe aan pages
        $stmt2 = $conn->prepare("INSERT INTO pages (template_id, url, status, created_at, pagecontent_id) VALUES (?, ?, 0, ?, ?)");
        $stmt2->execute([$template_id, $url, $created_at, $pagecontent_id]);

        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }
}


?>