<?php

// algorythm assumes that equasion looks like a - b = c where x is one from (a, b, c)
$equation = "27 - X = 17";
$equation = strtolower(str_replace(';', '', str_replace(' ', '', $equation)));
$split_by_equal_token = explode("=", $equation);
if (is_int(strpos($split_by_equal_token[1], "x"))) {
    $numbers = explode("-", $split_by_equal_token[0]);
    $x = intval($numbers[0]) - intval($numbers[1]);
} else {
    $left = explode("-", $split_by_equal_token[0]);
    if (is_int(strpos($left[1], "x"))) {
        $x = intval($left[0]) - intval($split_by_equal_token[1]);
    } else {
        $x = intval($left[1]) + intval($split_by_equal_token[1]);
    }
}
echo "Значение неизвестной переменной X: " . $x;
