<?php

require_once('../../config/database.php');

$templateDir = '../../views/';
$templates = glob($templateDir . 'template.*.php');

// Haal bestaande templates uit de database
$stmt = $pdo->query("SELECT filename FROM templates");
$dbTemplates = [];
if ($stmt) {
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $dbTemplates[] = $row['filename'];
    }
}

// Verwijder templates uit de database die niet meer als bestand bestaan
foreach ($dbTemplates as $dbTemplate) {
    if (!in_array($templateDir . $dbTemplate, $templates)) {
        $sql = "DELETE FROM templates WHERE filename = ?";
        $delete = $pdo->prepare($sql);
        $delete->execute([$dbTemplate]);
    }
}

// Voeg nieuwe templates toe aan de database
foreach ($templates as $filePath) {
    $fileName = basename($filePath);
    if (!in_array($fileName, $dbTemplates)) {
        $title = ucfirst(str_replace(['template.', '.php'], '', $fileName));
        $sql = "INSERT INTO templates (filename, title) VALUES (?, ?)";
        $insert = $pdo->prepare($sql);
        $insert->execute([$fileName, $title]);
    }
}

?>