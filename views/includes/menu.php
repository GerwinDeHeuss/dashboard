<?php foreach ($menuItems as $item): ?>
<a href="<?php echo htmlspecialchars($item['url']); ?>" class="nav-link">
    <?php echo htmlspecialchars($item['title']); ?>
</a>
<?php endforeach; ?>