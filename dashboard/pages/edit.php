<?php 

require_once  '../../controllers/controller.php';

include('../includes/header.php');

?>

<section id="pages">
    <div class="container">
        <div class="justify-between">
            <div class="intro">
                <h2><?= htmlspecialchars($page['title']) ?></h2>
                <p>Bewerk de pagina van <?= htmlspecialchars($page['title']) ?></p>
            </div>
            <div class="align-center">
                <button class="open-slide-in blue-btn">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#292D32"><path d="M382-240 154-468l57-57 171 171 367-367 57 57-424 424Z"/></svg>
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
                <li><button class="active" data-section="page">Pagina</button></li>
                <li><button data-section="settings">Widgets</button></li>
                <li><button data-section="profiel">Instellingen</button></li>
                </ul>
            </div>
            <div class="content">
                <div class="content-section active" id="page">Content voor pagina</div>
                <div class="content-section hidden" id="settings">Content voor Widgets</div>
                <div class="content-section hidden" id="profiel">Content voor Instellingen</div>
            </div>

        </div>
    </div>
</section>

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

</script>



<h3></h3>
<?php include '../includes/footer.php'; ?>