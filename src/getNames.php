<?php
include('api.php');
session_start();
$type = $_POST['type'];
$articleText = 'your article text here';
foreach ($_SESSION['articles'] as $index => $article) {
	$articleText .= json_encode($article);
}
$names = callOpenAI($articleText, $type);

echo json_encode($names);
?>
