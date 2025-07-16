<?php
session_start();
require_once '../config/config.php'; 

$message = '';

// Controleer of de gebruiker al is ingelogd
if (isset($_SESSION['userId'])) {
  header("Location: ../dashboard/pages/index.php");
  exit();
} 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $email = trim($_POST['email'] ?? '');
  $password = trim($_POST['password'] ?? '');

  if (empty($email) || empty($password)) {
      $message = '<div class="message error">Vul alstublieft alle velden in.</div>';
  } else {
      try {
          // Zoek de gebruiker op basis van e-mail
          $stmt = $pdo->prepare("SELECT userId, userEmail, userPassword, userRole FROM users WHERE userEmail = :email");
          $stmt->bindParam(':email', $email);
          $stmt->execute();
          $user = $stmt->fetch();

          if ($user && password_verify($password, $user['userPassword'])) {
              // Wachtwoord is correct, start sessie
              $_SESSION['userId'] = $user['userId'];
              $_SESSION['userEmail'] = $user['userEmail'];
              $_SESSION['userRole'] = $user['userRole'];

              header("Location: ../dashboard/pages/index.php");
              exit();
          } else {
              $message = '<div class="message error">Ongeldige e-mail of wachtwoord.</div>';
          }
      } catch (PDOException $e) {
          $message = '<div class="message error">Er is een databasefout opgetreden: ' . $e->getMessage() . '</div>';
      }
  }
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="./css/auth.css">
</head>
<body>
  <div class="container">
      <h2>Login</h2>
      <?php echo $message; ?>
      <form action="login.php" method="POST">
          <div class="form-group">
              <label for="email">E-mail:</label>
              <input type="email" id="email" name="email" required>
          </div>
          <div class="form-group">
              <label for="password">Wachtwoord:</label>
              <input type="password" id="password" name="password" required>
          </div>
          <button type="submit">Login</button>
      </form>
      <p class="link-text">Nog geen account? <a href="register.php">Registreer hier</a></p>
  </div>
</body>
</html>
