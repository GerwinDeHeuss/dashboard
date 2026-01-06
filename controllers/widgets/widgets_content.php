
<?php

require_once __DIR__ . '/../../config/config.php';

function getAllWidgetsContent($conn) {
    $sql = "SELECT * FROM WidgetContent";
    $stmt = $conn->query($sql);
    $widgetContent = [];
    if ($stmt) {
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $widgetContent[$row['id']] = $row;  // id als key
        }
    }
    return $widgetContent;
}



?>