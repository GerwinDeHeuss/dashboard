<?php

require_once('../../config/database.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_page'])) {
    $title = trim($_POST['title']);
    $template_id = intval($_POST['template_id']);

    // Maak url: kleine letters, spaties naar streepje, alleen letters/cijfers/streepjes
    $url = strtolower(trim($title));
    $url = preg_replace('/[^a-z0-9\s-]/', '', $url); // alleen a-z, 0-9, spatie, streepje
    $url = preg_replace('/[\s-]+/', '-', $url);      // spaties en dubbele streepjes naar één streepje

    $created_at = date('Y-m-d');

    if ($title && $template_id) {
        $stmt = $conn->prepare("INSERT INTO pages (title, template_id, url, status, created_at) VALUES (?, ?, ?, 0, ?)");
        $stmt->execute([$title, $template_id, $url, $created_at]);
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }
}

?>