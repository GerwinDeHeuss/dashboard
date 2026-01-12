<?php include 'error_messages.php'; ?>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <title>Titel</title>
    <link rel="stylesheet" href="/dashboard/css/style.css">
</head>

<body>

    <div class="sidebar" role="navigation" aria-label="Hoofdmenu">
        <div>
            <div class="header">
                <div>
                    <img src="../../img/logo-white.png" alt="">
                </div>
                <div>
                    <h1>HKunlimited</h1>
                    <p>Dashboard</p>
                </div>
            </div>
            <nav>
                <a href="/dashboard" class="active">Home</a>
                <a href="/dashboard/pages">Pagina's</a>
                <a href="/dashboard/widgets">Widgets</a>
                <a href="/dashboard/menu">Menu</a>
                <a href="/dashboard/profile">Profiel</a>
            </nav>
        </div>
        <a href="/dashboard/logout.php" class="logout-section" style="display: flex; align-items: center; gap: 8px; text-decoration: none; cursor: pointer; color: white;">
            <span class="material-symbols-outlined">logout</span>
            Uitloggen
        </a>
    </div>

    <div class="overlay"></div>

    <main>

        <header>
            <div class="align-center">
                <button class="toggle-btn" aria-label="Toggle sidebar">☰</button>
            </div>
            <div class="content">
                <h1>Dashboard</h1>
                <p>Beheer je website content</p>
            </div>
        </header>