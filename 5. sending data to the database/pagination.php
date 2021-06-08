<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Pagination</title>
    <link rel="stylesheet" href="style_pagination.css">
</head>
<body>
<?php
$host = 'localhost'; // адрес сервера
$database = 'articles'; // имя базы данных
$user = 'root'; // имя пользователя
$password = 'admin'; // пароль
$link = mysqli_connect($host, $user, $password, $database)
or die("Ошибка " . mysqli_error($link));
$query = "SELECT * FROM article";
$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
if ($result) {
    $rows = mysqli_num_rows($result);
    for ($i = 0; $i < $rows; ++$i) {
        $row[] = mysqli_fetch_row($result);
    }
    mysqli_free_result($result);

    $countPerPage = 2;
    $page = intval($_GET['page'] ?? 1);
    if ($page < 1) {
        $error = 'Запрошенная страница не сущеаствует';
    }
} ?>
<div class="section">
    <div class="main-content">
        <div class="main-content-articles">
            <?php
            for ($i = $page * $countPerPage; $i < ($page + 1) * $countPerPage; $i++) {
                if (!empty($row[$i])) { ?>
                    <div class="article">
                        <h1><?php print_r($row[$i][1]); ?></h1>
                        <div class="block-article-section">
                            <div class="img-item">
                                <?php print_r('<img src="' . $row[$i][4] . '" />'); ?>
                            </div>
                            <div class="article-item">
                                <p><?php print_r($row[$i][2]); ?></p>
                                <p class="date"><?php echo($row[$i][3]); ?></p>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            }
            $pagesCount = ceil($rows / $countPerPage);
            if ($pagesCount == 0) {
                $pagesCount = 1;
            }
            if ($page > $pagesCount) {
                $error = 'Запрошенная страница не сущеаствует';
                echo $error;
            }
            ?>
            <nav>
                <ul class="pagination">
                    <?php for ($i = 0; $i < $pagesCount; $i++) { ?>
                        <a href="?page=<?php echo $i; ?>">
                            <li class="item"><?php echo $i + 1; ?></li>
                        </a>
                    <?php } ?>
                </ul>
            </nav>
        </div>
    </div>
</div>
</body>
</html>
