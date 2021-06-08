<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Pagination</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php
$text = file_get_contents("text2.txt");
$itemsTags = explode("</p>", $text);
$items = [];
foreach ($itemsTags as $value) {
    if (!empty($value)) {
        $items[] = $value;
    }
}
/*Выделить цветом все вхождения какого-либо слова (подобрать из контекста) с любым регистром символов, не изменяя регистр оригинала.
Если повторов слова мало, можно взять несколько слов.*/

$arrayMapSearchWord = array_map(function ($item) {
    $colorWord = '#ff0057';
    $substituteWord = 'КуРткИ';
    $deleteTags = strip_tags($item);
    $splittingStringArraySymbol = explode(' ', $deleteTags);
    $search = preg_quote($substituteWord);
    foreach ($splittingStringArraySymbol as $value) {
        if (preg_match("/" . $search . "/iu", $value)) {
            return $colorWordText = preg_replace("/" . $search . "/iu", '<b style="color:' . $colorWord . '">' . $value . '</b>', '<div>' . $item . '</div>');
        }
    }
}, $items);
$arrayMapSearchWord2 = array_map(function ($item) {
    return $item;
}, $items);
$arr = [];
foreach ($arrayMapSearchWord2 as $key => $value) {
    foreach ($arrayMapSearchWord as $key2 => $value2) {
        if (!empty($value2) and $key == $key2) {
            $arr[$key] = $value2;
        }
    }
}
$resultChangeColor = array_replace($arrayMapSearchWord2, $arr);
/*Определить количество символов, количество слов и количество предложений для каждого абзаца.*/
/*Количество абзацев*/
$arrayMap = array_map(function ($item) {
    $punctuationMarks = ['.', '?', '!', '...'];
    $numberSentences = 0;
    foreach ($punctuationMarks as $value) {
        $numberSentences += substr_count($item, $value);
    }
    return $numberSentences;
}, $items);
/*Количество cлов*/
$arrayMapCountWord = array_map(function ($item) {
    $removing_punctuation = preg_replace("|[^\d\w ]+|i", "", $item);
    $splittingStringArray = explode(' ', $removing_punctuation);
    return count($splittingStringArray);
}, $items);
/*Количество символов*/
$arrayMapCountSymbol = array_map(function ($item) {
    $deleteTags = strip_tags($item);
    $splittingStringArraySymbol = explode(' ', $deleteTags);
    $countSymbols = 0;
    foreach ($splittingStringArraySymbol as $value) {
        if (!empty($value)) {
            $countSymbols += iconv_strlen(trim($value));
        }
    }
    return $countSymbols;
}, $items);
/*Выделить первую букву каждого предложения жирным шрифтом*/
/*Не доделано!*/
$arrayMapInitialLetter = array_map(function ($item) {
    $deleteTags = strip_tags($item);
    $splittingStringArraySymbol = explode('.', $deleteTags);
    foreach ($splittingStringArraySymbol as $value) {
        return '<b>' . mb_substr(trim($value), 0, 1) . '</b>';
    }
}, $items);


$countPerPage = 2; //Кол-во материалов на странице
$page = intval($_GET['page'] ?? 1);
if ($page < 1) {
    $error = 'Запрошенная страница не сущеаствует';
}
?>
<div class="section">
    <div class="main-content">
        <div class="main-content-articles">
            <h1>Постраничный вывод информации</h1>
            <?php
            for ($i = $page * $countPerPage; $i < ($page + 1) * $countPerPage; $i++) {
                echo "<p>" . $resultChangeColor[$i];
                if (!empty($items[$i])) { ?>
                    <div class="statistics">
                    <?php
                    echo "<h4>Статистика:</h4>";
                    echo "<p>" . 'Количество предложений: ' . $arrayMap[$i];
                    echo "<p>" . 'Количество слов: ' . $arrayMapCountWord[$i];
                    echo "<p>" . 'Количество cимволов: ' . $arrayMapCountSymbol[$i]; ?>
                    </div><?php
                }
            }
            $pagesCount = ceil(count($items) / $countPerPage);
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