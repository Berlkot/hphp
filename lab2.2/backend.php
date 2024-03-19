<?php
if (isset($_POST['expression'])) {
    $expression = $_POST['expression'];
    $result = calculateExpression($expression);
    header("X-answer: ".$result);
}

const operator_lookup = [
    "+" => 1,
    "-" => 1,
    "*" => 2,
    "/" => 2,
];

function calc_if_int($val) {
    if (is_numeric($val) && floor($val) != $val) {
        return (float)$val;
    }
    elseif (is_numeric($val)) {
        return number_format($val);
    } elseif ($val[0] == "-") {
        return - calculateExpression(substr($val, 1));
    }
    else {
        return calculateExpression($val);
    }
};

function calculateExpression($expression) {
    $offset = 0;
    $result = 0;
    preg_match_all("/((?=[^0-9\-]|^)-)?\((?:[^)(]+|(?R))*+\)|((?=[^0-9\-]|^)-)?[0-9\.]+/", $expression, $matches);
    $matches = $matches[0];
    if ($matches[0] == $expression) {
        while (preg_match_all("/^\(/", $expression) and preg_match_all("/\)$/", $expression)) {
            $expression = preg_replace("/(^\()|(\)$)/","", $expression);
        };
        
    }
    preg_match_all("/((?=[^0-9\-]|^)-)?\((?:[^)(]+|(?R))*+\)|((?=[^0-9\-]|^)-)?[0-9\.]+/", $expression, $matches);
    $matches = $matches[0];
    
    $operators = str_split(preg_replace("/((?=[^0-9\-]|^)-)?\((?:[^)(]+|(?R))*+\)|((?=[^0-9\-]|^)-)?[0-9\.]+/","", $expression));
    if (!$operators) {
        return calc_if_int($matches[0]);
    }
    while ($operators) {
        if ($offset > count($operators) - 1) {
            $offset = 0;
        }
        if (count($operators) > $offset + 1 and operator_lookup[$operators[$offset]] < operator_lookup[$operators[$offset + 1]]) {
            $offset += 1;
            continue;
        };
        $result = match ($operators[$offset]) {
            "+" => calc_if_int($matches[$offset]) + calc_if_int($matches[$offset+1]),
            "-" => calc_if_int($matches[$offset]) - calc_if_int($matches[$offset+1]),
            "*" => calc_if_int($matches[$offset]) * calc_if_int($matches[$offset+1]),
            "/" => calc_if_int($matches[$offset]) / calc_if_int($matches[$offset+1])
        };
        array_splice($matches, $offset, 2);
        array_unshift($matches, $result);
        array_splice($operators, $offset, 1);
    };
    return $result;
    
};
