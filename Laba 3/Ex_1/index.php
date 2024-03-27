<?php

echo "Task 1a \n";
$str1 = 'ahb acb aeb aeeb adcb axeb';
$pattern1 = '/a..b/';
$result1 = preg_match_all($pattern1, $str1, $matches);
echo "Строчки, соответствующие шаблону:\n";
print_r($matches[0]);
echo "\n";
echo "Task 1b \n";
$str2 = 'a1b2c3';
echo "Строка до преобразования " .$str2 ."\n";
$patterns2 = [];
$patterns2[0] = '/1/';
$patterns2[1] = '/2/';
$patterns2[2] = '/3/';
$replacements = [];
$replacements[0] = '1';
$replacements[1] = '4';
$replacements[2] = '9';
$result2 = preg_replace($patterns2, $replacements, $str2);
$result2 = preg_replace_callback('/\d/', function($num) {return $num[0]**3;}, $str2);
echo "После преобразования " .$result2 ."\n";
