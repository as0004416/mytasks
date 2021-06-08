<?php
/*Задание 1. Напишите скрипт, которой для числа $x выводит его значение разным цветом
зеленым – если $x положительно
желтым – если $x равно 0
красным – если $x отрицательно
*/
echo '<hr>';
function changeColorNumber($number)
{
    $colorPosNum = '#03ff0ce3';
    $colorZeroNum = '#ffe503e3';
    $colorNegNum = '#ff0303e3';
    if ($number > 0) {
        return 'Положительное число: ' . '<b style="color:' . $colorPosNum . '">' . $number . '</b>';
    } else if ($number == 0) {
        return 'Равно 0: ' . '<b style="color:' . $colorZeroNum . '">' . $number . '</b>';
    } else {
        return 'Отрицательное: ' . '<b style="color:' . $colorNegNum . '">' . $number . '</b>';
    }
}

echo changeColorNumber(5) . '<br>';
echo changeColorNumber(0) . '<br>';
echo changeColorNumber(-25) . '<br>';
echo '<hr>';
/*Задание 2. Напишите скрипт, определяющий сумму максимального и минимального из трех чисел $a, $b, $c.*/
function sumMinMaxNumbers($a, $b, $c)
{
    $max = 0;
    $min = 0;
    $sum = 0;
    if ($a > $b && $a > $c) {
        $max = $a;
        echo 'Максимальное число: ' . $max . '<br>';
    } elseif ($b > $a && $b > $c) {
        $max = $b;
        echo 'Максимальное число: ' . $max . '<br>';
    } else {
        $max = $c;
        echo 'Максимальное число: ' . $max . '<br>';
    }
    if ($a < $b && $a < $c) {
        $min = $a;
        echo 'Минимальное число: ' . $min . '<br>';
    } elseif ($b < $a && $b < $c) {
        $min = $b;
        echo 'Минимальное число: ' . $min . '<br>';
    } else {
        $min = $c;
        echo 'Минимальное число: ' . $min . '<br>';
    }
    $sum = $max + $min;
    return 'Сумма максимального и минимального из трех чисел: ' . $sum . '<br>';
}

echo sumMinMaxNumbers(1, 10, 100);
echo '<hr>';
/*Напишите скрипт, определяющий максимальное из четырех чисел $a, $b, $c, $d.*/
function maxNumber($a, $b, $c, $d)
{
    $max = 0;
    if ($a > $b && $a > $c && $a > $d) {
        $max = $a;
    } elseif ($b > $a && $b > $c && $b > $d) {
        $max = $b;
    } elseif ($c > $a && $c > $b && $c > $d) {
        $max = $c;
    } else {
        $max = $d;
    }
    return 'Максимальное число: ' . $max . '<br>';
}

echo maxNumber(10, 200, -4, 70);
echo '<hr>';
/*Известны длина и ширина сумки $a, $b, а также длина и ширина товара $c, $d.
Напишите скрипт, определяющий, можно ли товар упаковать в сумку.
Предусмотреть возможность ввода длины и ширины в произвольном порядке, например, 20, 30 или 30, 20.
Усложнение задачи: добавьте еще высоту сумки и высоту товара. Учтите, что товар можно повернуть.
*/
function packproduckBag($lenghtBag, $widthBag, $heightBag, $lenghtProduct, $widthProduct, $heightProduct)
{
    echo 'Характеристика сумки: <br>';
    echo 'Длина сумки: ' . $lenghtBag . '<br>';
    echo 'Ширина сумки: ' . $widthBag . '<br>';
    echo 'Высота сумки: ' . $heightBag . '<br>';
    echo 'Характеристика товара: <br>';
    echo 'Длина товара: ' . $lenghtProduct . '<br>';
    echo 'Ширина товара: ' . $widthProduct . '<br>';
    echo 'Высота товара: ' . $heightProduct . '<br>';
    if ($lenghtBag > $lenghtProduct && $widthBag > $widthProduct && $heightBag > $heightProduct) {
        return "Товар можно упаковать в сумку!";
    } elseif ($widthBag > $lenghtProduct && $lenghtBag > $widthProduct && $heightBag > $heightProduct) {
        return "Товар можно упаковать в сумку!";
    } else {
        return "Товар нельзя упаковать в сумку!";
    }
}

echo packproduckBag(2, 10, 20, 8, 28, 10);
echo '<hr>';
echo packproduckBag(10, 30, 20, 8, 28, 10);
echo '<hr>';
?>

