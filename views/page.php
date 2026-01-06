<?php 

require_once(__DIR__ . '../../config/database.php');

// Haal de URL op (mag ook leeg zijn)
$url = $_GET['url'] ?? '';

// Haal de pagina op, ook als url leeg is
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

// **Widgets ophalen met directe query hier**
$widgetContentStmt = $conn->query("SELECT * FROM WidgetContent");
$widgetContent = [];
if ($widgetContentStmt) {
    while ($row = $widgetContentStmt->fetch(PDO::FETCH_ASSOC)) {
        $widgetContent[$row['id']] = $row;  // Maak associative array met id als key
    }
}

// Koppel widgets aan deze pagina
$pageId = $page['id'];

foreach ($widgetContent as $widgetId => $widget) {
    // Controleer of deze widget op deze pagina al gekoppeld is
    $checkStmt = $conn->prepare("SELECT COUNT(*) FROM PageWidgets WHERE page_id = ? AND widget_id = ?");
    $checkStmt->execute([$pageId, $widgetId]);
    $exists = $checkStmt->fetchColumn();

    if (!$exists) {
        // Voeg de koppeling toe
        $insertStmt = $conn->prepare("INSERT INTO PageWidgets (page_id, widget_id) VALUES (?, ?)");
        $insertStmt->execute([$pageId, $widgetId]);
    }
}


// Zet gegevens klaar voor gebruik in template
$title = $pageContent['title']; 
$pageData = $page;
$pageDescription = $pageContent['description'] ?? '';

// Template includen, daarin kun je $widgetContent gebruiken
include __DIR__ . '/' . $template['filename'];
