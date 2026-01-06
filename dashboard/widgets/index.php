<?php 

require_once  '../../controllers/controller.php';

include('../includes/header.php');


?>

<section id="widgets">
    <div class="container">
        <div class="justify-between">
            <div class="intro">
                <h2>Widgets Beheer</h2>
                <p>Beheer alle Widgets van je website</p>
            </div>
            <div class="align-center">
                <button class="open-slide-in blue-btn">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                        fill="#292D32">
                        <path d="M440-440H200v-80h240v-240h80v240h240v80H520v240h-80v-240Z" />
                    </svg>
                    Nieuwe Widget
                </button>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="cards-wrapper">
            <?php foreach ($widgetContent as $content): ?>
            <?php foreach ($widgets as $widget): ?>
            <?php if ($widget['widgetcontent_id'] == $content['id']): ?>
            <div class="card">
                <div class="info">
                    <div>
                        <div>
                            <div class="icon align-center">
                                <svg xmlns="http://www.w3.org/2000/svg" height="32px" viewBox="0 -960 960 960"
                                    width="32px" fill="#00e1b4">
                                    <path
                                        d="M352-120H200q-33 0-56.5-23.5T120-200v-152q48 0 84-30.5t36-77.5q0-47-36-77.5T120-568v-152q0-33 23.5-56.5T200-800h160q0-42 29-71t71-29q42 0 71 29t29 71h160q33 0 56.5 23.5T800-720v160q42 0 71 29t29 71q0 42-29 71t-71 29v160q0 33-23.5 56.5T720-120H568q0-50-31.5-85T460-240q-45 0-76.5 35T352-120Zm-152-80h85q24-66 77-93t98-27q45 0 98 27t77 93h85v-240h80q8 0 14-6t6-14q0-8-6-14t-14-6h-80v-240H480v-80q0-8-6-14t-14-6q-8 0-14 6t-6 14v80H200v88q54 20 87 67t33 105q0 57-33 104t-87 68v88Zm260-260Z" />
                                </svg>
                            </div>
                        </div>
                        <h3><?= htmlspecialchars($content['title']) ?></h3>
                        <p><?= htmlspecialchars($content['description']) ?></p>
                    </div>
                    <div class="content">
                        <div>
                            <div class="justify-between">
                                <p>Gebruikt op:</p>
                                <p><strong>2 pagina's</strong></p>
                            </div>
                            <div class="justify-between">
                                <p>Laatst bewerkt</p>
                                <p><strong><?= htmlspecialchars($widget['last_edit']) ?></strong></p>
                            </div>
                        </div>
                        <div class="align-center gap10">
                            <div>
                                <a class="" href="edit.php?id=<?= $widget['id'] ?>">
                                    <button class="white-btn">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                            width="24px" fill="#292D32">
                                            <path
                                                d="M200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h357l-80 80H200v560h560v-278l80-80v358q0 33-23.5 56.5T760-120H200Zm280-360ZM360-360v-170l367-367q12-12 27-18t30-6q16 0 30.5 6t26.5 18l56 57q11 12 17 26.5t6 29.5q0 15-5.5 29.5T897-728L530-360H360Zm481-424-56-56 56 56ZM440-440h56l232-232-28-28-29-28-231 231v57Zm260-260-29-28 29 28 28 28-28-28Z" />
                                        </svg>
                                        Bewerken
                                    </button>
                                </a>
                            </div>
                            <div>
                                <form method="post" action="../../controllers/widgets/delete.php"
                                    style="display: inline;">
                                    <input type="hidden" name="id" value="<?= $widget['id'] ?>">
                                    <button type="submit" class="white-btn"
                                        onclick="return confirm('Weet je zeker dat je deze widget wilt verwijderen?');">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                            width="24px" fill="#292D32">
                                            <path
                                                d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520ZM360-280h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z" />
                                        </svg>
                                        Verwijderen
                                    </button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>
            <?php endforeach; ?>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<div id="addwidget"></div>
<div id="slide-in">
    <div class="slide-in-header">
        <h2>Nieuwe widget toevoegen</h2>
        <button id="slide-in-close">&times;</button>
    </div>
    <form method="post" style="padding: 20px 20px 20px 20px;">
        <label for="slide-in-title">Titel:</label><br>
        <input type="text" id="slide-in-title" name="title" required
            style="width: 100%; padding: 8px; margin-bottom: 12px;"><br>
        <label for="slide-in-description">Omschrijving:</label><br>
        <input type="text" id="slide-in-description" name="description" required
            style="width: 100%; padding: 8px; margin-bottom: 12px;"><br>
        <label for="slide-in-text">tekst:</label><br>
        <input type="text" id="slide-in-text" name="text" required
            style="width: 100%; padding: 8px; margin-bottom: 12px;"><br>
        <button type="submit" name="add_widget" style="" class="blue-btn">Toevoegen</button>
    </form>
</div>

<?php

if (!empty($_SESSION['error_message'])): ?>
<div class="alert error">
    <?= htmlspecialchars($_SESSION['error_message']) ?>
</div>
<?php unset($_SESSION['error_message']); ?>
<?php endif; ?>

<?php if (!empty($_SESSION['success_message'])): ?>
<div class="alert success">
    <?= htmlspecialchars($_SESSION['success_message']) ?>
</div>
<?php unset($_SESSION['success_message']); ?>
<?php endif; ?>

<?php 


include('../includes/footer.php');

?>