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

require_once('pages/delete.php');

require_once('widgets/widgets.php');
$widgets = getAllWidgets($conn);

require_once('templates/templates.php');
$templates = getAllTemplates($conn);

require_once('widgets/widgets_content.php');
$widgetContent = getAllWidgetsContent($conn);

$widgetContentMap = [];
foreach ($widgetContent as $content) {
    $widgetContentMap[$content['id']] = $content;
}

require_once('widgets/addWidgets.php');

require_once('options/options.php');
$dashboardUrl = rtrim(getOption($conn, 'dashboard_url'), '/') . '/';

?>