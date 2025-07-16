<!-- Slide-in drawer voor nieuwe pagina -->
<div id="drawer-overlay"></div>
<div id="drawer">
    <div class="drawer-header">
        <h2>Nieuwe pagina toevoegen</h2>
        <button id="drawer-close">&times;</button>
    </div>
    <form method="post" style="padding: 0 20px 20px 20px;">
        <label for="drawer-title">Titel:</label><br>
        <input type="text" id="drawer-title" name="title" required style="width: 100%; padding: 8px; margin-bottom: 12px;"><br>
        <label for="drawer-template">Template:</label><br>
        <select id="drawer-template" name="template_id" required style="width: 100%; padding: 8px; margin-bottom: 12px;">
            <?php foreach ($templates as $template): ?>
                <option value="<?= $template['id'] ?>"><?= htmlspecialchars($template['title']) ?></option>
            <?php endforeach; ?>
        </select><br>
        <button type="submit" name="add_page" style="padding: 10px 18px; background: #3FD8BE; color: #fff; border: none; border-radius: 4px; cursor: pointer;">Toevoegen</button>
    </form>
</div>

<style>
    #drawer-overlay {
    position: fixed;
    top: 0; left: 0; right: 0; bottom: 0;
    background: rgba(44,62,80,0.18);
    z-index: 1000;
    opacity: 0;
    pointer-events: none;
    transition: opacity 0.3s;
}
#drawer {
    position: fixed;
    top: 0;
    right: -420px;
    width: 400px;
    height: 100vh;
    background: #fff;
    box-shadow: -4px 0 24px rgba(44,62,80,0.10);
    z-index: 1001;
    transition: right 0.4s cubic-bezier(.77,0,.18,1);
    display: flex;
    flex-direction: column;
}
#drawer.open {
    right: 0;
}
#drawer-overlay.open {
    opacity: 1;
    pointer-events: auto;
}
.drawer-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px 20px 10px 20px;
    border-bottom: 1px solid #e5e7eb;
}
#drawer-close {
    background: none;
    border: none;
    font-size: 2em;
    color: #888;
    cursor: pointer;
    line-height: 1;
}
#drawer form label {
    font-weight: 500;
}
</style>