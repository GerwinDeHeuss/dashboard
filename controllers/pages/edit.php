<?php

require_once __DIR__ . '/../../config/config.php';

$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id = $_POST['id'] ?? null;
    $title = $_POST['title'] ?? '';
    $url = $_POST['url'] ?? '';
    $contentId = $_POST['id'] ?? null;
    $templateId = $_POST['template_id'] ?? null;
    $pageId = $_GET['id'] ?? null; 
    $status = isset($_POST['status']) ? 1 : 0;
    $metatitle = $_POST['metatitle'] ?? '';
    $metadescrition = $_POST['metadescription'] ?? '';

    $stmt = $conn->prepare("SELECT COUNT(*) FROM pages WHERE url = ? AND id != ?");
    $stmt->execute([$url, $pageId]);
    $urlExists = $stmt->fetchColumn() > 0;

    if ($urlExists) {
        $_SESSION['error_message'] = 'Deze URL bestaat al. Kies een andere.';
        header("Location: " . $_SERVER['REQUEST_URI']);
        exit;
    }

    if (!$id || !$title) {
        echo "Ongeldige invoer.";
        exit;
    }
    try {
        $stmt = $conn->prepare("UPDATE pageContent SET title = ?, meta_title = ?, meta_description = ? WHERE id = ?");
        $stmt->execute([$title, $metatitle, $metadescrition, $contentId]);

        
        $stmt = $conn->prepare("UPDATE pages SET template_id = ?, url = ?, status = ? WHERE id = ?");
        $stmt->execute([$templateId, $url, $status, $pageId]);


        $_SESSION['success_message'] = 'Pagina succesvol opgeslagen.';
        header("Location: " . $_SERVER['REQUEST_URI']);
        exit;

    } catch (PDOException $e) {
        echo "Er is iets fout gegaan bij het updaten: " . htmlspecialchars($e->getMessage());
        exit;
    }
}

$stmt = $conn->prepare("
    SELECT pages.*, pageContent.title AS title, pageContent.meta_title AS metatitle, pageContent.meta_description AS metadescription, pageContent.id AS content_id
    FROM pages
    INNER JOIN pageContent ON pages.pagecontent_id = pageContent.id
    WHERE pages.id = :id
");
$stmt->execute(['id' => $id]);
$page = $stmt->fetch(PDO::FETCH_ASSOC);

?>