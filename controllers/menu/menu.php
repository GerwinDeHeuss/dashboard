<?php

function getAllMenuItems($conn) {
    try {
        $stmt = $conn->query("SELECT * FROM menu_items WHERE is_active = 1 ORDER BY order_position ASC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        error_log("Error fetching menu items: " . $e->getMessage());
        return [];
    }
}

?>
