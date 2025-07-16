
<?php

require_once('../../config/database.php');

function getAllPages($pdo) {
    $sql = "SELECT pages.*, templates.title AS template_title
            FROM pages
            LEFT JOIN templates ON pages.template_id = templates.id";
    $stmt = $pdo->query($sql);

    $pages = [];
    if ($stmt) {
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $pages[] = $row;
        }
    }
    return $pages;
}

?>