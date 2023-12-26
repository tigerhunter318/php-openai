<?php
session_start();

// Remove article from session
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $index = $_POST['index'];
    unset($_SESSION['articles'][$index]);
}

// Redirect back to the main page
header('Location: ../index.php');
exit;
?>
