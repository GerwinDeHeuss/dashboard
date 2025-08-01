<?php


$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;


$stmt = $conn->prepare("SELECT * FROM pages WHERE id = :id");
$stmt->execute(['id' => $id]);
$page = $stmt->fetch(PDO::FETCH_ASSOC);

$contentStmt = $conn->prepare("SELECT * FROM PageContent WHERE id = ?");
$contentStmt->execute([$page['pagecontent_id']]);
$pageContent = $contentStmt->fetch();


?>