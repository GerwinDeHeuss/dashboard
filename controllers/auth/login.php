<?php

// Login controller
date_default_timezone_set('Europe/Amsterdam');
$conn->exec("SET time_zone = '+01:00'");

$error_message = '';
$email_value = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $inputEmail = $_POST['userEmail'] ?? '';
    $inputPassword = $_POST['userPassword'] ?? '';
    
    // Bewaar email voor gebruik in formulier
    $email_value = $inputEmail;

    $sql = "SELECT * FROM users WHERE userEmail = :userEmail AND userIsActive = 1";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':userEmail', $inputEmail);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    $passwordMatch = false;
    if ($user) {
        // Try password_verify first
        if (password_verify($inputPassword, $user['userPassword'])) {
            $passwordMatch = true;
        } 
        // If that fails, check if it's a plain text password that matches
        elseif ($inputPassword === $user['userPassword']) {
            $passwordMatch = true;
            // Update to hashed password
            $newHash = password_hash($inputPassword, PASSWORD_DEFAULT);
            $updateSql = "UPDATE users SET userPassword = :newPassword WHERE userId = :userId";
            $updateStmt = $conn->prepare($updateSql);
            $updateStmt->bindParam(':newPassword', $newHash);
            $updateStmt->bindParam(':userId', $user['userId']);
            $updateStmt->execute();
        }
    }

    if ($user && $passwordMatch) {
        $_SESSION['user_id'] = $user['userId'];
        $_SESSION['userEmail'] = $user['userEmail'];
        header("Location: " . URLROOT . "dashboard/index.php");
        exit();
    } else {
        $error_message = 'Onjuiste email of wachtwoord!';
    }
}

?>
