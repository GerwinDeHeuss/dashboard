<?php 


require_once  '../../controllers/controller.php';

include('../includes/header.php');

?>

<form method="post" action="" onsubmit="isUpdated = false;">

    <?php if (!empty($_SESSION['success_message'])): ?>
    <div class="alert success">
        <?= htmlspecialchars($_SESSION['success_message']) ?>
    </div>
    <?php unset($_SESSION['success_message']); ?>
    <?php endif; ?>

    <div class="alert warning" id="unsaved-alert" style="display: none;">
        Je hebt wijzigingen gemaakt die nog niet zijn opgeslagen.
    </div>

    <?php if (!empty($_SESSION['error_message'])): ?>
    <div class="alert error">
        <?= htmlspecialchars($_SESSION['error_message']) ?>
    </div>
    <?php unset($_SESSION['error_message']); ?>
    <?php endif; ?>


    <section id="pages">
        <div class="container">
            <div class="justify-between">
                <div class="intro">
                    <h2 class="flex"><a href="./index.php"><svg xmlns="http://www.w3.org/2000/svg" height="32px"
                                viewBox="0 -960 960 960" width="32px" fill="#14253D">
                                <path d="m313-440 224 224-57 56-320-320 320-320 57 56-224 224h487v80H313Z" />
                            </svg></a><?= htmlspecialchars($page['title']) ?></h2>
                    <p>Bewerk de pagina van <?= htmlspecialchars($page['title']) ?></p>
                </div>
                <div class="align-center">
                    <button type="submit" name="save_page" class=" blue-btn">
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
                        <li><button type="button" data-section="banner">Banner</button></li>
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
                                    <input type="text" id="title" name="title"
                                        value="<?= htmlspecialchars($page['title']) ?>" required>
                                </div>

                                <div class="form-row-flex">
                                    <label for="url"><?= htmlspecialchars($dashboardUrl) ?></label>
                                    <input type="text" id="url" name="url" value="<?= htmlspecialchars($page['url']) ?>"
                                        <?= empty($page['url']) ? 'readonly' : 'required' ?>>
                                </div>


                                <div class="form-row">
                                    <label for="title">Template</label><br>
                                    <select id="slide-in-template" name="template_id" required
                                        style="width: 100%; padding: 8px; margin-bottom: 20px;">
                                        <?php foreach ($templates as $template): ?>
                                        <option value="<?= $template['id'] ?>"
                                            <?= ($template['id'] == $page['template_id']) ? 'selected' : '' ?>>
                                            <?= htmlspecialchars($template['title']) ?>
                                        </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <p class="created"><?= htmlspecialchars($page['created_at']) ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="content-section hidden" id="banner">
                        <div class="header">
                            <h2>Banner bewerken voor <?= htmlspecialchars($page['title']) ?></h2>
                        </div>
                        <div class="info">
                            <p class="created"><?= htmlspecialchars($page['created_at']) ?></p>
                        </div>
                    </div>
                    <div class="content-section hidden" id="settings">
                        <div class="header">
                            <h2>Widgets bewerken voor <?= htmlspecialchars($page['title']) ?></h2>
                        </div>
                        <div class="info">
                            <p class="created"><?= htmlspecialchars($page['created_at']) ?></p>
                        </div>
                    </div>
                    <div class="content-section hidden" id="profiel">
                        <div class="header">
                            <h2>Instellingen bewerken voor <?= htmlspecialchars($page['title']) ?></h2>
                        </div>
                        <div class="info">
                            <div class="info">

                                <input type="hidden" name="id" value="<?= htmlspecialchars($page['content_id']) ?>">

                                <div class="form-group">

                                    <div class="form-row">
                                        <label for="title">META Titel</label><br>
                                        <input type="text" id="metatitle" name="metatitle"
                                            value="<?= htmlspecialchars($page['metatitle']) ?>">
                                    </div>

                                    <div class="form-row">
                                        <label for="title">META Omschrijving</label><br>
                                        <input type="text" id="metadescription" name="metadescription"
                                            value="<?= htmlspecialchars($page['metadescription']) ?>">
                                    </div>

                                    <div class="form-row">
                                        <label for="status">Beschikbaar zetten</label><br>
                                        <label class="switch">
                                            <input type="checkbox" id="status" name="status" value="1"
                                                <?= $page['status'] ? 'checked' : '' ?>>
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                </div>
                                <p class="created"><?= htmlspecialchars($page['created_at']) ?></p>
                            </div>
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

        document.querySelectorAll('.content-section').forEach(section => {
            section.classList.add('hidden');
            section.classList.remove('active');
        });

        const target = document.getElementById(sectionId);
        target.classList.remove('hidden');
        target.classList.add('active');

        document.querySelectorAll('.menu button').forEach(b => b.classList.remove('active'));

        btn.classList.add('active');
        document.getElementById(sectionId).classList.remove('hidden');
    });
});

const defaultSection = document.getElementById('pages');
defaultSection.classList.remove('hidden');
defaultSection.classList.add('active');

const successAlert = document.querySelector('.alert.success');
if (successAlert) {
    setTimeout(() => {
        successAlert.style.display = 'none';
    }, 4000);
}

let isUpdated = false;
let pendingHref = null;

const unsavedAlert = document.getElementById('unsaved-alert');
const stayBtn = document.getElementById('stay-here');
const leaveBtn = document.getElementById('leave-page');

document.querySelectorAll('input, textarea, select').forEach(input => {
    input.addEventListener('input', () => {
        isUpdated = true;
    });
});

document.querySelectorAll('a').forEach(link => {
    link.addEventListener('click', (e) => {
        if (isUpdated) {
            e.preventDefault();
            pendingHref = link.href;
            unsavedAlert.style.display = 'block';
        }
    });
});

stayBtn.addEventListener('click', () => {
    unsavedAlert.style.display = 'none';
    pendingHref = null;
});

leaveBtn.addEventListener('click', () => {
    window.location.href = pendingHref;
});

document.querySelector('form')?.addEventListener('submit', () => {
    isUpdated = false;
    unsavedAlert.style.display = 'none';
});
</script>



<h3></h3>
<?php include '../includes/footer.php'; ?>