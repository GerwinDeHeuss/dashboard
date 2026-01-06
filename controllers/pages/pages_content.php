
<?php

require_once __DIR__ . '/../../config/config.php';

function getAllPageContent($conn) {
    $sql = "SELECT * FROM PageContent
            ORDER BY 
              CASE WHEN title = 'Home' THEN 0 ELSE 1 END,
              title ASC";
              
    $stmt = $conn->query($sql);

    $pageContent = [];
    if ($stmt) {
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $pageContent[] = $row;
        }
    }
    return $pageContent;
}


?>