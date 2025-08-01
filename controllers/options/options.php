
<?php

require_once __DIR__ . '/../../config/config.php';

function getOption($conn, $key) {
    $stmt = $conn->prepare("SELECT value FROM options WHERE `key` = ?");
    $stmt->execute([$key]);
    return $stmt->fetchColumn();
}

?>