<?php if (!empty($_SESSION['success_message'])): ?>
<div class="alert success">
    <?= htmlspecialchars($_SESSION['success_message']) ?>
</div>
<?php unset($_SESSION['success_message']); ?>
<?php endif; ?>

<?php if (!empty($_SESSION['error_message'])): ?>
<div class="alert error">
    <?= htmlspecialchars($_SESSION['error_message']) ?>
</div>
<?php unset($_SESSION['error_message']); ?>
<?php endif; ?>