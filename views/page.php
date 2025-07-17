<?php 

require_once(__DIR__ . '../../config/database.php');

$url = $_GET['url'] ?? '';

if (!$url) {
    echo "Geen pagina opgegeven.";
    exit;
}

// Alleen pagina ophalen met status 0 (normaal)
$stmt = $conn->prepare("SELECT * FROM pages WHERE url = ? AND status = 1");
$stmt->execute([$url]);
$page = $stmt->fetch();

if (!$page) {
    http_response_code(404);
    echo "Pagina niet gevonden of in onderhoud.";
    exit;
}

// Zoek template en laad deze zoals eerder
$templateStmt = $conn->prepare("SELECT * FROM templates WHERE id = ?");
$templateStmt->execute([$page['template_id']]);
$template = $templateStmt->fetch();

if (!$template || !file_exists(__DIR__ . '/' . $template['filename'])) {
    http_response_code(500);
    echo "Template niet gevonden.";
    exit;
}

$title = $page['title'];
$pageData = $page;

include __DIR__ . '/' . $template['filename'];

?>
