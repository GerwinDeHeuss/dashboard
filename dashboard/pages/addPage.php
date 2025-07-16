<?php require '../../controllers/controller.php'; ?>

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

