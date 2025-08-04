<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8" />
    <title><?php echo htmlspecialchars($pageContent['meta_title']); ?></title>
    <meta name="description" content="<?php echo htmlspecialchars($pageContent['meta_description'] ?? ''); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <h1><?php echo htmlspecialchars($pageContent['title']); ?></h1>

    <p>Welkom op deze pagina! fullwidth</p>
</body>
</html>
