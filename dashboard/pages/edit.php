<?php 

require_once  '../../controllers/controller.php';

include('../includes/header.php');


?>

<form method="post" action="">
    <section id="pages">
        <div class="container">
            <div class="justify-between">
                <div class="intro">
                    <h2 class="flex"><a href="./index.php"><svg xmlns="http://www.w3.org/2000/svg" height="32px" viewBox="0 -960 960 960" width="32px" fill="#14253D"><path d="m313-440 224 224-57 56-320-320 320-320 57 56-224 224h487v80H313Z"/></svg></a><?= htmlspecialchars($page['title']) ?></h2>
                    <p>Bewerk de pagina van <?= htmlspecialchars($page['title']) ?></p>
                </div>
                <div class="align-center">
                    <button type="submit" class=" blue-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                            fill="#292D32">
                            <path d="M382-240 154-468l57-57 171 171 367-367 57 57-424 424Z" />
                        </svg>
                        Opslaan
                    </button>
                </div>
            </div>
        </div>
    </section>

    <section id="pages_edit">
        <div class="container">
            <div class="flex">
                <div class="menu">
                    <ul>
                        <li><button type="button" class="active" data-section="page">Pagina</button></li>
                        <li><button type="button" data-section="settings">Widgets</button></li>
                        <li><button type="button" data-section="profiel">Instellingen</button></li>
                    </ul>
                </div>
                <div class="content">
                    <div class="content-section active" id="page">
                        <div class="header">
                            <h2>Pagina bewerken voor <?= htmlspecialchars($page['title']) ?></h2>
                        </div>
                        <div class="info">

                            <input type="hidden" name="id" value="<?= htmlspecialchars($page['content_id']) ?>">

                            <div class="form-group">
                                <div class="form-row">
                                    <label for="title">Titel</label><br>
                                    <input type="text" id="title" name="title" value="<?= htmlspecialchars($page['title']) ?>" required>
                                </div>

                                <div class="form-row-flex">
                                    <label for="url"><?= htmlspecialchars($dashboardUrl)?></label>
                                    <input type="text" id="url" name="url" value="<?= htmlspecialchars($page['url']) ?>" required>
                                </div>

                                <div class="form-row">
                                    <label for="title">Template</label><br>    
                                    <select id="slide-in-template" name="template_id" required style="width: 100%; padding: 8px; margin-bottom: 20px;">
                                        <?php foreach ($templates as $template): ?>
                                            <option value="<?= $template['id'] ?>" 
                                                <?= ($template['id'] == $page['template_id']) ? 'selected' : '' ?>>
                                                <?= htmlspecialchars($template['title']) ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="content-section hidden" id="settings">
                        <div class="header">
                            <h2>Widgets bewerken voor <?= htmlspecialchars($page['title']) ?></h2>
                        </div>
                        <div class="info">
                            test
                        </div>
                    </div>
                    <div class="content-section hidden" id="profiel">
                        <div class="header">
                            <h2>Instellingen bewerken voor <?= htmlspecialchars($page['title']) ?></h2>
                        </div>
                        <div class="info">
                            test
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    

</form>



<script>
document.querySelectorAll('.menu button').forEach(btn => {
    btn.addEventListener('click', () => {
        const sectionId = btn.getAttribute('data-section');

        // Verberg alle secties
        document.querySelectorAll('.content-section').forEach(section => {
            section.classList.add('hidden');
            section.classList.remove('active');
        });

        // Laat de gekozen sectie zien
        const target = document.getElementById(sectionId);
        target.classList.remove('hidden');
        target.classList.add('active');

        document.querySelectorAll('.menu button').forEach(b => b.classList.remove('active'));

        // Active knop + sectie
        btn.classList.add('active');
        document.getElementById(sectionId).classList.remove('hidden');
    });
});

// Standaard openen van 'pages'
const defaultSection = document.getElementById('pages');
defaultSection.classList.remove('hidden');
defaultSection.classList.add('active');

const successAlert = document.querySelector('.alert.success');
    if (successAlert) {
        setTimeout(() => {
            successAlert.style.display = 'none';
        }, 4000);
    }
</script>



<h3></h3>
<?php include '../includes/footer.php'; ?>