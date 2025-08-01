<?php 

require_once(__DIR__ . '../../config/database.php');

$url = $_GET['url'] ?? '';

if (!$url) {
    echo "Geen pagina opgegeven.";
    exit;
}

// Alleen gepubliceerde pagina ophalen (status = 1)
$stmt = $conn->prepare("SELECT * FROM pages WHERE url = ? AND status = 1");
$stmt->execute([$url]);
$page = $stmt->fetch();

if (!$page) {
    http_response_code(404);
    echo "Pagina niet gevonden of in onderhoud.";
    exit;
}

// Haal de gekoppelde PageContent op
$contentStmt = $conn->prepare("SELECT * FROM PageContent WHERE id = ?");
$contentStmt->execute([$page['pagecontent_id']]);
$pageContent = $contentStmt->fetch();

if (!$pageContent) {
    http_response_code(500);
    echo "Inhoud van de pagina niet gevonden.";
    exit;
}

// Haal het template op
$templateStmt = $conn->prepare("SELECT * FROM templates WHERE id = ?");
$templateStmt->execute([$page['template_id']]);
$template = $templateStmt->fetch();

if (!$template || !file_exists(__DIR__ . '/' . $template['filename'])) {
    http_response_code(500);
    echo "Template niet gevonden.";
    exit;
}

// Zet gegevens klaar voor gebruik in template
$title = $pageContent['title']; 
$pageData = $page;
$pageDescription = $pageContent['description'] ?? '';

include __DIR__ . '/' . $template['filename'];
?>
