<?php
require_once __DIR__ . '/../../config/config.php';

$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

$stmt = $conn->prepare("
    SELECT pages.*, pageContent.title AS title
    FROM pages
    INNER JOIN pageContent ON pages.pagecontent_id = pageContent.id
    WHERE pages.id = :id
");
$stmt->execute(['id' => $id]);
$page = $stmt->fetch(PDO::FETCH_ASSOC);
?>
