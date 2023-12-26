<!DOCTYPE html>
<html>
<head>
    <title>Article Form</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div class="top-section">
        <form action="src/submit.php" method="post">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" required><br><br>
            <label for="content">Content:</label>
            <textarea id="content" name="content" rows="5" cols="30" required></textarea><br><br>
            <input type="submit" value="Add">
        </form>
        <div class="buttons">
            <button id="companyBtn">Extract company names</button>
            <button id="humanBtn">Extract people names</button>
        </div>
    </div>
	<div id="companyModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <table id="companyTable">
                <tr>
                    <th>No</th>
                    <th>Name</th>
                </tr>
            </table>
        </div>
    </div>
    <div id="humanModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <table id="humanTable">
                <tr>
                    <th>No</th>
                    <th>Name</th>
                </tr>
            </table>
        </div>
    </div>
    <div class="article-list">
        <?php
        session_start();
        if (isset($_SESSION['articles'])) {
            $articleText = '';
            foreach ($_SESSION['articles'] as $index => $article) {
                $articleText .= $article["content"] . ' ';
                echo "<div class='article-card'>";
                echo "<h2>" . $article["title"]. "</h2>";
                echo "<p>" . $article["content"]. "</p>";
                echo "<form action='src/delete.php' method='post'>";
                echo "<input type='hidden' name='index' value='" . $index . "'>";
                echo "<input type='submit' value='Delete'>";
                echo "</form>";
                echo "</div>";
            }
        } else {
            echo "No articles found";
        }
        ?>
    </div>
    <script src="js/script.js"></script>
</body>
</html>
