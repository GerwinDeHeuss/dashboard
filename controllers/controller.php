<?php

require_once('../../config/database.php');

require_once(__DIR__ . '/templates/syncTemplates.php');

require_once('pages/pages.php');
$pages = getAllPages($conn);

require_once('templates/templates.php');
$templates = getAllTemplates($conn);

?>