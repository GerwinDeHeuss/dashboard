<?php

function getAllMenuItems($conn) {
    try {
        $stmt = $conn->query("SELECT m.* FROM menu_items m 
                              LEFT JOIN pages p ON m.page_id = p.id 
                              WHERE m.is_active = 1 
                              AND (m.page_id IS NULL OR p.status = 1)
                              ORDER BY m.order_position ASC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        error_log("Error fetching menu items: " . $e->getMessage());
        return [];
    }
}

function getAllMenuItemsForDashboard($conn) {
    try {
        $stmt = $conn->query("SELECT m.*, p.url as page_url FROM menu_items m 
                              LEFT JOIN pages p ON m.page_id = p.id 
                              WHERE (m.page_id IS NULL OR p.status = 1)
                              ORDER BY order_position ASC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        error_log("Error fetching menu items: " . $e->getMessage());
        return [];
    }
}

function updateMenuItemOrder($conn, $id, $newOrder) {
    try {
        $stmt = $conn->prepare("UPDATE menu_items SET order_position = ? WHERE id = ?");
        return $stmt->execute([$newOrder, $id]);
    } catch (PDOException $e) {
        error_log("Error updating menu order: " . $e->getMessage());
        return false;
    }
}


?>
