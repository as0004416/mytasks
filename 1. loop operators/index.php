<h1>Операторы циклов</h1><h4>Задание 1</h4><p> Напишите скрипт, выводящий таблицу из k случайных чисел с чередованием фона строк из 3 цветов – цвет1, цвет2,
    цвет3, цвет1, цвет2, цвет3 и т.д.</p>
<h4>Задание 2</h4><p>Обеспечьте плавное изменение цвета шрифта строк от черного к белому (первая строка – черный цвет, последняя строка
– белый, промежуточные – градации серого). Можно просто добавить к коду первого задания.
</p>
<table style="display: flex;justify-content: center;">
    <tr>
        <th>Номер</th>
        <th colspan="5">Число</th>
    </tr>
    <?php
        $num = 1;
        $step_color = 0;
        $n = 18;
        $step = round(255/$n);
        for ($i = 1; $i < $n; $i++) {
            if($num>=$n){
                break;
            }
            for ($r = 1; $r < 2; $r++) {
                $color = 0+$step_color;
                echo '<tr><th style="background: red;color:RGB('.$color .', '.$color.', '.$color.');">';
                echo $num++;
                echo '</th><th style="background: red;color:RGB('.$color.', '.$color.', '.$color.');">';
                echo rand(0,100);
                echo '</th></tr>';
                $step_color+=$step;
            }
            for ($g = 2; $g < 3; $g++) {
                $color = 0+$step_color;
                echo '<tr><th style="background: green;color:RGB('.$color.', '.$color.', '.$color.');">';
                echo $num++;
                echo '</th><th style="background: green;color:RGB('.$color.', '.$color.', '.$color.');">';
                echo rand(0,100);
                echo '</th></tr>';
                $step_color+=$step;
            }
            for ($b = 3; $b < 4; $b++) {
                $color = 0+$step_color;
                echo '<tr><th style="background: blue;color:RGB('.$color.', '.$color.', '.$color.');">';
                echo $num++;
                echo '</th><th style="background: blue;color:RGB('.$color.', '.$color.', '.$color.');">';
                echo rand(0,100);
                echo '</th></tr>';
                $step_color+=$step;
            }
        }
    ?>
</table>

<h1>Массивы</h1><h4>Задание 1</h4><p>  Определить произведение элементов массива, расположенных между максимальным и минимальным элементами.</p>
<?php

    $arr = [2,5,0,2,10,-4,15,2,40,3,1];
    $min = null;
    $min_key = null;
    $max = null;
    $max_key = null;
    for ($i=0;$i<count($arr);$i++){
        if($arr[$i]<$min or $min===null){
            $min = $arr[$i];
            $min_key = $i;
        }
        if($arr[$i]>$max or $max===null){
            $max = $arr[$i];
            $max_key = $i;
        }
    }
    $res = 1;
   for($i = $min_key+1; $i<$max_key; $i++){
        $res*=$arr[$i];
   }
   foreach ($arr as $value){
       echo ' '.$value.' ';
   }
   echo '<br>Минимальный элемент: '.$min;
   echo '<br>Максимальный элемент: '.$max;
   print_r('<br>Произведение между max и min элементами: '.$res);
?>
<h4>Задание 2</h4><p> Преобразовать массив таким образом, чтобы в первой его половине располагались элементы, стоявшие в исходном массиве
на нечетных позициях (1, 2, 3, ...), а во второй половине — элементы, стоявшие на четных позициях (0, 2, 4, ...)
</p>
<?php
    $arr = [0,1,2,3,4,5,6,7,8,9,10];
    echo 'Исходный массив: ';
    echo "<pre>";
    print_r($arr);
    echo "</pre>";
    for($i = 0; $i<count($arr); $i++){
        if($i%2==0){
            $even_number[] = $arr[$i];
        }else{
            $noteven_number[] = $arr[$i];
        }
    }
    $result_arr = array_merge($noteven_number,$even_number);
    echo 'Преобразаванный массив: ';
    echo "<pre>";
    print_r($result_arr);
    echo "</pre>";
?>
<h4>Задание 3</h4><p> В двумерном массиве определить номера столбцов, не содержащих ни одного нулевого элемента,
    и вычислить произведения элементов каждого из этих столбцов.</p>
<?php

    /* НЕ ВЫПОЛНЕНО!*/
    $arr = array(array(20,50,40,2,50,null),array(3,40,null,null,5,5),array(2,5,8,5,8,4));
    echo 'Исходный массив: ';
    echo "<pre>";
    print_r($arr);
    echo "</pre>";
    $new_arr = [];
    $empty_arr = [];
    for($i = 0; $i < 6; $i++){
            $new_arr[] = 1;
    }
    for($i = 0; $i< count($arr); $i++){
        /*строки*/
        for ($j = 0; $j < count($arr[$i]);$j++){
        /*столбцы*/
            /*if(empty($arr[$i][$j])){
                $empty_arr[$j] = $arr[$i][$j];
            }*/
            $new_arr[$j]*=$arr[$i][$j];
        }
    }
    echo 'Произведение элементов каждого из столбцов: ';
    echo "<pre>";
    print_r($new_arr);
    echo "</pre>";
    //print_r($empty_arr);

?>
