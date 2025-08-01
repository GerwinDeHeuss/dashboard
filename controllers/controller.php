<?php

require_once __DIR__ . '/../config/config.php';

require_once(__DIR__ . '/templates/syncTemplates.php');

require_once('pages/pages.php');
$pages = getAllPages($conn);

require_once('pages/pages_content.php');
$pageContent = getAllPageContent($conn);

$pageContentMap = [];
foreach ($pageContent as $content) {
    $pageContentMap[$content['id']] = $content;
}

require_once('pages/addPages.php');

require_once('pages/edit.php');

require_once('templates/templates.php');
$templates = getAllTemplates($conn);

require_once('options/options.php');
$dashboardUrl = rtrim(getOption($conn, 'dashboard_url'), '/') . '/';

?>