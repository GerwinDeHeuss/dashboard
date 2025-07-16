<?php

require_once('../../config/database.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_page'])) {
    $title = trim($_POST['title']);
    $template_id = intval($_POST['template_id']);
    if ($title && $template_id) {
        $stmt = $conn->prepare("INSERT INTO pages (title, template_id) VALUES (?, ?)");
        $stmt->execute([$title, $template_id]);
        // Herlaad de pagina zodat de nieuwe pagina direct zichtbaar is
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }
}

?>