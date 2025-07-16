
<?php

require_once('../../config/database.php');

function getAllTemplates($pdo) {
    $sql = "SELECT id, title, filename FROM templates";
    $stmt = $pdo->query($sql);

    $templates = [];
    if ($stmt) {
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $templates[] = $row;
        }
    }
    return $templates;
}

?>