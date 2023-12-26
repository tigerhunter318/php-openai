<?php
session_start();

// Add new article to session
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $content = $_POST['content'];

    $_SESSION['articles'][] = array('title' => $title, 'content' => $content);
}

// Redirect back to the main page
header('Location: ../index.php');
exit;
?>
