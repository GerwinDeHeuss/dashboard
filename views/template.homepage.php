<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8" />
    <title><?php echo htmlspecialchars($pageContent['meta_title']); ?></title>
    <meta name="description" content="<?php echo htmlspecialchars($pageContent['meta_description'] ?? ''); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../views/css/style.css">
</head>
<body>
    <!-- <h1><?php echo htmlspecialchars($pageContent['title']); ?></h1> -->

    <!-- <p>Welkom op deze pagina! homepage</p>
    <h1></h1>
    <h1><?php echo htmlspecialchars($widgetContent[2]['description']);?></h1>
    <?php var_dump($widgetContent);?> -->

    <!-- Banner Section -->
      <div class="banner">
        <!-- Navigation Bar -->
        <nav class="navbar">
          <div class="nav-container">
            <div class="nav-content">
              <div class="logo">
                <h2>HKunlimited</h2>
              </div>
              <div class="nav-menu">
                <?php include __DIR__ . '/includes/menu.php'; ?>
              </div>
              <div class="nav-button">
                <img style="width: 60px" src="./img/2 2.png" alt="" />
              </div>
            </div>
          </div>
        </nav>

        <!-- Background Pattern -->
        <div class="background-pattern">
          <div class="pattern-circle pattern-circle-1"></div>
          <div class="pattern-circle pattern-circle-2"></div>
        </div>

        <!-- Main Banner Content -->
        <div class="banner-content">
          <div class="content-grid">
            <!-- Left Content -->
            <div class="content-left">
              <div class="content-text">
               
                  <?php echo ($widgetContent[14]['title']); ?>
                
                <p class="main-description">
                  Wij brengen jouw digitale ambities tot leven. HKunlimited
                  combineert technische innovatie met creativiteit om unieke
                  oplossingen te bouwen die jouw bedrijf laten groeien. Samen
                  maken we van elke uitdaging
                </p>
              </div>
              <div class="button-group">
                <!-- Changed to darker background color for better contrast with white text -->
                <a href="#services">
                  <button
                    class="btn-primary"
                    style="
                      background-color: #021031 !important;
                      color: white !important;
                      border: 2px solid #3fd8be !important;
                    "
                  >
                    Ontdek Meer
                  </button>
                </a>
              </div>
            </div>

            <!-- Right Visual Element -->
            <div class="content-right">
              <div class="visual-card">
                <div class="visual-content">
                  <div class="visual-item">
                    <div class="rotating-icon">
                      <div class="icon-inner"></div>
                    </div>
                    <div class="progress-bars">
                      <div class="progress-bar progress-bar-1"></div>
                      <div class="progress-bar progress-bar-2"></div>
                    </div>
                  </div>
                  <div class="visual-grid">
                    <div class="grid-item"></div>
                    <div class="grid-item grid-item-highlight"></div>
                    <div class="grid-item"></div>
                  </div>
                  <div class="stats">
                    <div class="stat-item">
                      <div class="stat-bar stat-bar-1"></div>
                      <span class="stat-label">100%</span>
                    </div>
                    <div class="stat-item">
                      <div class="stat-bar stat-bar-2"></div>
                      <span class="stat-label">85%</span>
                    </div>
                    <div class="stat-item">
                      <div class="stat-bar stat-bar-3"></div>
                      <span class="stat-label">70%</span>
                    </div>
                  </div>
                </div>
                <div class="floating-element floating-element-1"></div>
                <div class="floating-element floating-element-2"></div>
              </div>
            </div>
          </div>
        </div>

        <!-- Bottom Accent Line -->
        <div class="accent-line"></div>
      </div>




</body>
</html>