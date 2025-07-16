<?php

require_once('../../config/database.php');

$templateDir = '../../views/';
$templates = glob($templateDir . 'template.*.php');

// Haal bestaande templates uit de database
$stmt = $conn->query("SELECT filename FROM templates");
$dbTemplates = [];
if ($stmt) {
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $dbTemplates[] = $row['filename'];
    }
}

// Voeg nieuwe templates toe aan de database
foreach ($templates as $filePath) {
    $fileName = basename($filePath);
    if (!in_array($fileName, $dbTemplates)) {
        $title = ucfirst(str_replace(['template.', '.php'], '', $fileName));
        $sql = "INSERT INTO templates (filename, title) VALUES (?, ?)";
        $insert = $conn->prepare($sql);
        $insert->execute([$fileName, $title]);
    }
}

?>