
<?php

require_once __DIR__ . '/../../config/config.php';

function getAllWidgets($conn) {
    $sql = "SELECT * from widget";
    $stmt = $conn->query($sql);

    $widgets = [];
    if ($stmt) {
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $widgets[] = $row;
        }
    }
    return $widgets;
}

?>