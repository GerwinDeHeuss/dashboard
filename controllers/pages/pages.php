
<?php

require_once('../../config/database.php');

function getAllPages($conn) {
    $sql = "SELECT pages.*, templates.title AS template_title
            FROM pages
            LEFT JOIN templates ON pages.template_id = templates.id";
    $stmt = $conn->query($sql);

    $pages = [];
    if ($stmt) {
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $pages[] = $row;
        }
    }
    return $pages;
}

?>