<?php

require_once __DIR__ . '/../../config/config.php';

$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id = $_POST['id'] ?? null;
    $title = $_POST['title'] ?? '';
    $url = $_POST['url'] ?? '';
    $contentId = $_POST['id'] ?? null;
    $templateId = $_POST['template_id'] ?? null;
    $pageId = $_GET['id'] ?? null; // De pages.id komt uit de URL

    if (!$id || !$title) {
        echo "Ongeldige invoer.";
        exit;
    }
    try {
        $stmt = $conn->prepare("UPDATE pageContent SET title = ? WHERE id = ?");
        $stmt->execute([$title, $contentId]);

        // Update de template_id in pages
        $stmt = $conn->prepare("UPDATE pages SET template_id = ?, url = ? WHERE id = ?");
        $stmt->execute([$templateId, $url, $pageId]);

        header("Location: " . $_SERVER['REQUEST_URI']);
        exit;
    } catch (PDOException $e) {
        echo "Er is iets fout gegaan bij het updaten: " . htmlspecialchars($e->getMessage());
        exit;
    }
}

$stmt = $conn->prepare("
    SELECT pages.*, pageContent.title AS title, pageContent.id AS content_id
    FROM pages
    INNER JOIN pageContent ON pages.pagecontent_id = pageContent.id
    WHERE pages.id = :id
");
$stmt->execute(['id' => $id]);
$page = $stmt->fetch(PDO::FETCH_ASSOC);

?>