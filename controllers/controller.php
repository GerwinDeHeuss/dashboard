<?php

require_once('../../config/database.php');

require_once(__DIR__ . '/templates/syncTemplates.php');

require_once('pages/pages.php');
$pages = getAllPages($pdo);

require_once('pages/addPages.php');

require_once('templates/templates.php');
$templates = getAllTemplates($pdo);

?>