<?php
// ex 1
    $a = 27; $b = 12;
    $res = round(sqrt($a**2 + $b**2), 2);
    echo $res, "<br>";
// ex 11
    $quieter = 'Тише'; $go = 'едешь'; $further = 'дальше';
    echo "$quieter $go, $further будешь! <br>";
// ex 14
    $quieter = 'Тише'; $go = 'едешь'; $further = 'дальше'; 
    echo $quieter.$go.",".$further."будешь!"."<br>";
// ex 19
    $a = 4.6; $b = 7.3; $c = '3.8'; $d = '7.9кг';
    echo $a." значение потолка => ".floor($a).", значение пола => ".ceil($a)." округление => ".round($a)."<br>";
    echo $b." значение потолка => ".floor($b).", значение пола => ".ceil($b)." округление => ".round($b)."<br>";
    echo $c." значение потолка => ".floor($c).", значение пола => ".ceil($c)." округление => ".round($c)."<br>";
    echo $d." значение потолка => ".floor((float)$d).", значение пола => ".ceil((float)$d)." округление => ".round((float)$d)."<br>";
// ex 22
    $a = 4; $b = 3; $c = " мандаринок<br>";
    echo $a*$b.$c;
// ex 34
    $a = 2; $b = 2.0;$c = "2";$d = "two";$g = true;$f = false;
    $arr = [$a, $b, $c, $d, $g, $f];
    echo "<table>";
    foreach($arr as $k) {
        $converted_res = (bool)$k ? 'true' : 'false';
        echo "<tr><th>".gettype($k)."</th> <th>".$converted_res."</th></tr>";
    };
    echo "</table>";
// ex 43
    $c = 27;$b = 12;
    if ($c > 0 and $b > 0){
        echo $c**$b;
    } elseif ($c < 0 and $b < 0) {
        echo $c+$b;
    } else {
        echo $c * $b;
    };
echo "<br>";
// ex 26
$a = 54; $b = 6; $c = ' попугаев';
echo $a/$b.$c."<br>";
// ex 38
$a = 7; $b = '8';
echo ++$a > --$b ? ++$a : --$b;
// ex 47
$number = 362525200;
echo sprintf('%e', $number);