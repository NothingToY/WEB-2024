<?php

echo "Task 1a \n";

$str1 = 'ahb acb aeb aeeb adcb axeb';
$pattern1 = '/a..b/';
$result1 = preg_match_all($pattern1, $str1, $matches);

echo "Строчки, соответствующие шаблону:\n";
print_r($matches[0]);

echo "\n";

