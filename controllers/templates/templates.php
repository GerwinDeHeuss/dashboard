
<?php

require_once('../../config/database.php');

function getAllTemplates($conn) {
    $sql = "SELECT id, title, filename FROM templates";
    $stmt = $conn->query($sql);

    $templates = [];
    if ($stmt) {
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $templates[] = $row;
        }
    }
    return $templates;
}

?>