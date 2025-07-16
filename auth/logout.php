<?php
session_start();

// Vernietig alle sessievariabelen
$_SESSION = array();

// Als de sessiecookie bestaat, verwijder deze dan.
// Dit zal de sessie ook aan de client-kant vernietigen.
if (ini_get("session.use_cookies")) {
  $params = session_get_cookie_params();
  setcookie(session_name(), '', time() - 42000,
      $params["path"], $params["domain"],
      $params["secure"], $params["httponly"]
  );
}

// Vernietig de sessie
session_destroy();

// Stuur de gebruiker door naar de login pagina
header("Location: login.php");
exit();
?>
