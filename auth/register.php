<?php
session_start();
require_once '../config/database.php'; // Zorg ervoor dat je database configuratie bestand correct is

$message = '';
$email_value = ''; // Variabele om email waarde te behouden

// Controleer of de gebruiker al is ingelogd
if (isset($_SESSION['userId'])) {
  header("Location: ../dashboard/pages/index.php");
  exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $email = trim($_POST['email'] ?? '');
  $password = trim($_POST['password'] ?? '');
  $confirm_password = trim($_POST['confirm_password'] ?? '');
  
  $email_value = $email; // Bewaar email waarde voor hergebruik in formulier

  if (empty($email) || empty($password) || empty($confirm_password)) {
      $message = '<div class="message error">Vul alstublieft alle velden in.</div>';
  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $message = '<div class="message error">Ongeldig e-mailformaat.</div>';
  } elseif ($password !== $confirm_password) {
      $message = '<div class="message error">Wachtwoorden komen niet overeen.</div>';
  } else {
      try {
          // Controleer of e-mail al bestaat
          $stmt = $pdo->prepare("SELECT userId FROM users WHERE userEmail = :email");
          $stmt->bindParam(':email', $email);
          $stmt->execute();
          if ($stmt->fetch()) {
              $message = '<div class="message error">Dit e-mailadres is al geregistreerd.</div>';
          } else {
              // Hash het wachtwoord
              $hashed_password = password_hash($password, PASSWORD_DEFAULT);
              $current_date = date('Y-m-d'); // Huidige datum
              
              // Genereer een willekeurige 10-cijferige userId
              do {
                  $userId = random_int(1000000000, 9999999999); // 10-cijferige random int
                  
                  // Controleer of deze userId al bestaat
                  $checkStmt = $pdo->prepare("SELECT userId FROM users WHERE userId = :userId");
                  $checkStmt->bindParam(':userId', $userId);
                  $checkStmt->execute();
                  $userIdExists = $checkStmt->fetch();
              } while ($userIdExists); // Herhaal tot we een unieke userId hebben

              // Voeg de nieuwe gebruiker toe aan de database
              $stmt = $pdo->prepare("INSERT INTO users (userId, userEmail, userPassword, userRole, userCreateDate) VALUES (:userId, :email, :password, 'gebruiker', :createDate)");
              $stmt->bindParam(':userId', $userId);
              $stmt->bindParam(':email', $email);
              $stmt->bindParam(':password', $hashed_password);
              $stmt->bindParam(':createDate', $current_date);

              if ($stmt->execute()) {
                  // Start sessie voor de nieuw geregistreerde gebruiker
                  $_SESSION['userId'] = $userId;
                  $_SESSION['userEmail'] = $email;
                  $_SESSION['userRole'] = 'gebruiker';
                  
                  header("Location: ../dashboard/pages/index.php");
                  exit();
              } else {
                  $message = '<div class="message error">Registratie mislukt. Probeer het opnieuw.</div>';
              }
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
  <title>Registreren</title>
  <link rel="stylesheet" href="./css/auth.css">
</head>
<body>
  <div class="container">
      <h2>Registreren</h2>
      <?php echo $message; ?>
      <form action="register.php" method="POST">
          <div class="form-group">
              <label for="email">E-mail:</label>
              <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($email_value); ?>" required>
          </div>
          <div class="form-group">
              <label for="password">Wachtwoord:</label>
              <input type="password" id="password" name="password" required>
          </div>
          <div class="form-group">
              <label for="confirm_password">Bevestig Wachtwoord:</label>
              <input type="password" id="confirm_password" name="confirm_password" required>
          </div>
          <button type="submit">Registreren</button>
      </form>
      <p class="link-text">Al een account? <a href="login.php">Login hier</a></p>
  </div>
</body>
</html>
