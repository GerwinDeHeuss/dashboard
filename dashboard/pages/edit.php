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


<h3></h3>
<?php include '../includes/footer.php'; ?>