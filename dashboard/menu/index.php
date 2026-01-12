<?php 

require_once  '../../controllers/controller.php';

include('../includes/header.php');

// Handle success message from redirect
if (isset($_GET['success']) && $_GET['success'] == '1') {
    $_SESSION['success_message'] = 'Menu succesvol opgeslagen!';
    header('Location: ' . strtok($_SERVER['REQUEST_URI'], '?'));
    exit;
}

?>

<section id="widgets">
    <div class="container">
        <div class="justify-between">
            <div class="intro">
                <h2>Menu's Beheeren</h2>
                <p>Beheer alle Menu's van je website</p>
            </div>
            <div class="align-center">
                <button type="button" onclick="saveAllChanges()" class="blue-btn">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                        fill="#292D32">
                        <path d="M382-240 154-468l57-57 171 171 367-367 57 57-424 424Z" />
                    </svg>
                    Opslaan
                </button>
            </div>
        </div>
    </div>
    <section id="menu_edit">
        <div class="container">
            <div class="flex">
                <div class="menu">
                    <ul>
                        <li><button type="button" class="active" data-section="header">Header</button></li>
                        <li><button type="button" data-section="footer">Footer</button></li>
                    </ul>
                </div>
                <div class="content">
                    <div class="content-section active" id="header">
                        <div class="menu-columns">
                            <!-- Actieve menu items -->
                            <div class="menu-column">
                                <h3>Actieve Menu Items</h3>
                                <p style="color: #666; margin-bottom: 15px; font-size: 14px;">Sleep items hiernaartoe om ze actief te maken</p>
                                <div class="menu-items-list" data-active="1">
                                    <?php foreach ($menuItemsDashboard as $item): ?>
                                    <?php if ($item['is_active']): ?>
                                    <div class="menu-item" data-id="<?php echo $item['id']; ?>"
                                        data-active="<?php echo $item['is_active']; ?>">
                                        <div class="menu-item-drag">
                                            <span class="drag-handle">☰</span>
                                        </div>
                                        <div class="menu-item-content">
                                            <div class="menu-item-info">
                                                <strong><?php echo htmlspecialchars($item['title']); ?></strong>
                                                <span
                                                    class="menu-url"><?php echo htmlspecialchars($item['url']); ?></span>
                                                <?php if ($item['page_id']): ?>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                    <?php endforeach; ?>
                                </div>
                            </div>

                            <!-- Inactieve menu items -->
                            <div class="menu-column">
                                <h3>Beschikbare Pagina's</h3>
                                <p style="color: #666; margin-bottom: 15px; font-size: 14px;">Sleep items hiernaartoe om ze inactief te maken</p>
                                <div class="menu-items-list" data-active="0">
                                    <?php foreach ($menuItemsDashboard as $item): ?>
                                    <?php if (!$item['is_active']): ?>
                                    <div class="menu-item" data-id="<?php echo $item['id']; ?>"
                                        data-active="<?php echo $item['is_active']; ?>">
                                        <div class="menu-item-drag">
                                            <span class="drag-handle">☰</span>
                                        </div>
                                        <div class="menu-item-content">
                                            <div class="menu-item-info">
                                                <strong><?php echo htmlspecialchars($item['title']); ?></strong>
                                                <span
                                                    class="menu-url"><?php echo htmlspecialchars($item['url']); ?></span>
                                                <?php if ($item['page_id']): ?>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="content-section hidden" id="footer">
                        <div class="header">
                            <h2>Footer Menu</h2>
                        </div>
                        <div class="info">
                            <p>Hier kunnen later footer menu items komen</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section

<?php include('../includes/footer.php'); ?>