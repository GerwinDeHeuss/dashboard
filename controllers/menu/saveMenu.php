<?php

require_once __DIR__ . '/../../config/config.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'save_all') {
    $activeItems = json_decode($_POST['active_items'], true);
    $inactiveItems = json_decode($_POST['inactive_items'], true);
    
    $success = true;
    
    try {
        // Update active items
        foreach ($activeItems as $index => $id) {
            $stmt = $conn->prepare("UPDATE menu_items SET is_active = 1, order_position = ? WHERE id = ?");
            if (!$stmt->execute([$index + 1, $id])) {
                $success = false;
            }
        }
        
        // Update inactive items
        foreach ($inactiveItems as $id) {
            $stmt = $conn->prepare("UPDATE menu_items SET is_active = 0 WHERE id = ?");
            if (!$stmt->execute([$id])) {
                $success = false;
            }
        }
        
        echo json_encode(['success' => $success]);
    } catch (PDOException $e) {
        error_log("Error saving menu: " . $e->getMessage());
        echo json_encode(['success' => false, 'error' => 'Database error']);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Invalid request']);
}

exit;
