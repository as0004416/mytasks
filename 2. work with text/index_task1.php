<!--Определить, сколько раз встречается в тексте слово Symfony и вывести текст, выделив его в тексте цветом.-->
<?php
$text = file_get_contents("text.txt");
$word = 'Symfony';
$substituteWord = 'Symfony';
$colorWord = '#ff0057';
$splittingString = explode('.', $text);
$removeSpaces = [];
$splittingStringSubarray = [];
$combineArrays = [];
foreach ($splittingString as $value) {
    $removeSpaces[] = trim($value);
}
foreach ($removeSpaces as $value) {
    $splittingStringArray = explode(' ', $value);
    $splittingStringSubarray[] = $splittingStringArray;
}
foreach ($splittingStringSubarray as $value) {
    $combineArrays = array_merge($combineArrays, $value);
}
$countRepetingWord = [];
foreach ($combineArrays as $value) {
    if (!empty($value) and $value == strpos($value, $word)) {
        $countRepetingWord[] = $value;
    }
}
print_r('Количество встречающегося слова в тексте: ' . count($countRepetingWord));
$colorWordText = str_replace($substituteWord, '<b style="color:' . $colorWord . '">' . $word . '</b>', '<div>' . $text . '</div>');
echo $colorWordText;
?>
<!--Вывести в браузер статистику файла – количество абзацев, предложений, слов, символов.-->
<?php
$text = file_get_contents("text.txt");
$arrayWords = [];
$combineArrays = [];
$resultCountWords = [];
$countParagraphs = substr_count($text, '<p>');
print_r('Количество абзацев: ' . $countParagraphs);
$punctuationMarks = ['.', '?', '!', '...'];
$punctuationCharacter = ['.', '-', '!', ',', '?'];
foreach ($punctuationMarks as $value) {
    $numberSentences += substr_count($text, $value);
}
print_r('<br>Количество предложений: ' . $numberSentences);
$removing_punctuation = preg_replace("|[^\d\w ]+|i", "", $text);
$resultCountWords = [];
$splittingStringArray = explode(' ', $removing_punctuation);
foreach ($splittingStringArray as $value) {
    if (!empty($value)) {
        $resultCountWords[] = $value;
    }
}
print_r('<br>Количество слов в тексте: ' . count($resultCountWords));
$splittingStringArraySymbol = explode(' ', $text);
foreach ($splittingStringArraySymbol as $value) {
    if (!empty($value)) {
        $countSymbols += strlen(trim($value));
    }
}
print_r('<br>Количество символов в тексте: ' . $countSymbols);
?>
<!--Найти самое длинное слово. Если таких несколько, вывести в браузер их все.-->
<?php
$text = file_get_contents("text.txt");
$removeSpaces = [];
$combineArrays = [];
$splittingStringArray = [];
$removing_punctuation = preg_replace("|[^\d\w ]+|i", "", $text);
$splittingStringArray = explode(' ', $removing_punctuation);
$arrayMap = array_map(function ($item) {
    return strlen($item);
}, $splittingStringArray);
$longestWord = array_filter($splittingStringArray, function ($item) use ($arrayMap) {
    return strlen($item) == max($arrayMap);
});
print_r('<br>Самые длинные слова в тексте: ');
echo '<pre>';
print_r($longestWord);
echo '</pre>';
?>
<!--Для каждого символа, имеющегося в тексте подсчитать, сколько раз он там встречается, символы расположить в возрастающем порядке.-->
<?php
$text = file_get_contents("text.txt");
foreach (count_chars($text, 1) as $i => $value) {
    echo '" ' . chr($i) . ' " встречается в тексте => ' . $value . ' разa.<br>';
}
?>
