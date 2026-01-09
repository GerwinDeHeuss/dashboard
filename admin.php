<?php

require_once __DIR__ . '/config/config.php';

require_once __DIR__ . '/controllers/auth/login.php';

?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Dashboard</title>
    <link rel="stylesheet" href="./dashboard/css/style.css">
</head>
<body>
    <div class="login-wrapper">
        <div class="login-container">
            <h1>Inloggen Dashboard</h1>
            <form method="POST" action="">
                <label for="email">Email</label>
                <input type="email" name="userEmail" id="email" placeholder="me@example.com"
                    value="<?php echo htmlspecialchars($email_value); ?>" required>

                <div class="password-row">
                    <label for="password">Wachtwoord</label>
                    <a href="">Vergeten?</a>
                </div>
                <input name="userPassword" type="password" id="password" required>

                <?php if (!empty($error_message)): ?>
                <div class="error-message-login">
                    <?php echo htmlspecialchars($error_message); ?>
                </div>
                <?php endif; ?>

                <button type="submit" class="blue-btn blue-btn-fullwidth">Inloggen</button>
            </form>
        </div>
    </div>
</body>
</html>