<?php 

require_once  '../../controllers/controller.php';

include('../includes/header.php');

?>

<section id="pages">
    <div class="container">
        <div class="justify-between">
            <div class="intro">
                <h2>Pagina Beheer</h2>
                <p>Beheer alle pagina's van je website</p>
            </div>
            <div class="align-center">
                <button class="open-slide-in blue-btn">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                        fill="#292D32">
                        <path d="M440-440H200v-80h240v-240h80v240h240v80H520v240h-80v-240Z" />
                    </svg>
                    Nieuwe Pagina
                </button>
            </div>
        </div>
    </div>

    <div class="container">
        <?php foreach ($pageContent as $content): ?>
            <?php foreach ($pages as $page): ?>
                <?php if ($page['pagecontent_id'] == $content['id']): ?>
                    <div class="card">
                        <div class="info justify-between">
                            <div class="flex gap20">
                                <div class="align-center">
                                    <div class="icon align-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="32px" viewBox="0 -960 960 960" width="32px"
                                            fill="#14253D">
                                            <path
                                                d="M320-240h320v-80H320v80Zm0-160h320v-80H320v80ZM240-80q-33 0-56.5-23.5T160-160v-640q0-33 23.5-56.5T240-880h320l240 240v480q0 33-23.5 56.5T720-80H240Zm280-520v-200H240v640h480v-440H520ZM240-800v200-200 640-640Z" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="directioncolumn gap5">
                                    <h3><?= htmlspecialchars($content['title']) ?></h3>
                                    <p>/<?= htmlspecialchars($page['url']) ?></p>
                                    <div class="flex gap10">
                                        <p class="align-center"><?= htmlspecialchars($page['created_at']) ?></p>
                                        <p class="status <?= $page['status'] == 1 ? 'status--groen' : 'status--oranje' ?>">
                                            <?= $page['status'] == 1 ? 'Gepubliceerd' : 'Concept' ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="align-center gap10">
                                <div>
                                    <a class="" href="<?= $dashboardUrl . htmlspecialchars($page['url']) ?>" target="_blank">
                                        <button class="white-btn">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                                                fill="#292D32">
                                                <path
                                                    d="M480-320q75 0 127.5-52.5T660-500q0-75-52.5-127.5T480-680q-75 0-127.5 52.5T300-500q0 75 52.5 127.5T480-320Zm0-72q-45 0-76.5-31.5T372-500q0-45 31.5-76.5T480-608q45 0 76.5 31.5T588-500q0 45-31.5 76.5T480-392Zm0 192q-146 0-266-81.5T40-500q54-137 174-218.5T480-800q146 0 266 81.5T920-500q-54 137-174 218.5T480-200Zm0-300Zm0 220q113 0 207.5-59.5T832-500q-50-101-144.5-160.5T480-720q-113 0-207.5 59.5T128-500q50 101 144.5 160.5T480-280Z" />
                                            </svg>
                                            Bekijken
                                        </button>
                                    </a>
                                </div>
                                <div>
                                    <a class="" href="edit.php?id=<?= $page['id'] ?>">
                                        <button class="white-btn">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                                            fill="#292D32">
                                            <path
                                                d="M200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h357l-80 80H200v560h560v-278l80-80v358q0 33-23.5 56.5T760-120H200Zm280-360ZM360-360v-170l367-367q12-12 27-18t30-6q16 0 30.5 6t26.5 18l56 57q11 12 17 26.5t6 29.5q0 15-5.5 29.5T897-728L530-360H360Zm481-424-56-56 56 56ZM440-440h56l232-232-28-28-29-28-231 231v57Zm260-260-29-28 29 28 28 28-28-28Z" />
                                        </svg>
                                        Bewerken
                                        </button>
                                    </a>
                                </div>
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                                        fill="#292D32">
                                        <path
                                            d="M240-400q-33 0-56.5-23.5T160-480q0-33 23.5-56.5T240-560q33 0 56.5 23.5T320-480q0 33-23.5 56.5T240-400Zm240 0q-33 0-56.5-23.5T400-480q0-33 23.5-56.5T480-560q33 0 56.5 23.5T560-480q0 33-23.5 56.5T480-400Zm240 0q-33 0-56.5-23.5T640-480q0-33 23.5-56.5T720-560q33 0 56.5 23.5T800-480q0 33-23.5 56.5T720-400Z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        <?php endforeach; ?>
    </div>
</section>

<div id="addPage"></div>
<div id="slide-in">
    <div class="slide-in-header">
        <h2>Nieuwe pagina toevoegen</h2>
        <button id="slide-in-close">&times;</button>
    </div>
    <form method="post" style="padding: 20px 20px 20px 20px;">
        <label for="slide-in-title">Titel:</label><br>
        <input type="text" id="slide-in-title" name="title" required style="width: 100%; padding: 8px; margin-bottom: 12px;"><br>
        <label for="slide-in-template">Template:</label><br>
        <select id="slide-in-template" name="template_id" required style="width: 100%; padding: 8px; margin-bottom: 20px;">
            <?php foreach ($templates as $template): ?>
                <option value="<?= $template['id'] ?>"><?= htmlspecialchars($template['title']) ?></option>
            <?php endforeach; ?>
        </select><br>
        <button type="submit" name="add_page" style="" class="blue-btn">Toevoegen</button>
    </form>
</div>

<?php include '../includes/footer.php'; ?>
