<?php
session_start();

include(__DIR__ . '/database.php');

// Auth check - skip voor admin.php (login pagina)
$user = $_SESSION['user_id'] ?? null;
$current_page = basename($_SERVER['PHP_SELF']);
if (!$user && $current_page !== 'admin.php') {
    header("Location: /dashboard/admin.php");
    exit();
}

define('APPROOT', dirname(__DIR__)); // of een ander pad naar je root


define('URLROOT', 'http://dashboard.nl/');

?>