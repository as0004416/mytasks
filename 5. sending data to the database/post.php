<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Add article</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
</body>
</html>
<?php
$servername = 'localhost';
$username = 'root';
$password = 'admin';
$dbname = 'articles';
if (isset($_POST['title'])) {
    $mysqli = new mysqli($servername, $username, $password, $dbname);

    if ($mysqli->connect_error) {
        die('Ошибка подключения (' . $mysqli->connect_errno . ') '
            . $mysqli->connect_error);
    }
    $article_title = $_POST['title'];
    $article_description = $_POST['description'];
    $article_date = $_POST['date'];
    $article_image = 'img/'.$_FILES['image']['name'];
    if (isset($_FILES) && $_FILES['image']['error'] == 0) { // Проверяем, загрузил ли пользователь файл
        $destiation_dir = dirname(__FILE__) . '/img/' . $_FILES['image']['name']; // Директория для размещения файла
        move_uploaded_file($_FILES['image']['tmp_name'], $destiation_dir); // Перемещаем файл в желаемую директорию
    } else {
        $article_image = "img/st_photo.jpg";
    }
    $sql = "INSERT INTO article (article_title, article_description, article_date,article_image)
VALUES ('$article_title', '$article_description', '$article_date','$article_image')";
    if (mysqli_query($mysqli, $sql)) {
        echo '<div class="section"><div class="new-entry-added">Новая запись добавлена успешно!</div></div>';
        echo '<div class="section-added-article"><a href="index.php" class="new-article">Добавить статью</a></div>';
        echo '<div class="section-articles"><a href="pagination.php" class="new-articles">Посмотреть Запись</a></div>';
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
    }

    mysqli_close($mysqli);
}
?>