<?php
$file = "file.txt";
if (file_exists($file)) {
    $file = file_get_contents($file);
} else {
    echo 'Файл' . $file . 'не существует!';
}
$gettingOffers = [];
$punctuationMarks = ['.', '?', '...', '!'];
foreach ($punctuationMarks as $value) {
    $gettingOffers = explode($value, $file);
    break;
}
$arrayMapSearchWord = array_map(function ($item) {
    $colorWord = '#ff0057';
    $keywords = ['FaSHion', 'cloTHes', 'PEOple'];
    $splittingStringArraySymbol = explode(' ', $item);
    foreach ($keywords as $item_word) {
        $search = preg_quote($item_word);
        foreach ($splittingStringArraySymbol as $value) {
            if (preg_match("/" . $search . "/iu", $value) && strlen($value) == strlen($item_word)) {
                return $colorWordText = preg_replace("/" . $search . "/iu", '<b style="color:' . $colorWord . '">' . $value . '</b>', '<div>' . $item . '</div>');
            }
        }
        //break;
    }
}, $gettingOffers);
foreach ($arrayMapSearchWord as $value) {
    if (!empty($value)) {
        $arrayMapSearchWordResult[] = trim(strip_tags($value . '.'));
    }
}
/*Вывод в файл*/
$finalFile = file_put_contents('finalFile.txt', implode("\r\n", $arrayMapSearchWordResult));

/*Вывод в браузере*/
foreach ($arrayMapSearchWord as $value) {
    if (!empty($value)) {
        $arrayMapSearchWordResultBrowser[] = $value;
    }
}
echo '<pre>';
print_r($arrayMapSearchWordResultBrowser);
echo '<pre>';
?>