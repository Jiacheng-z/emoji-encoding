<?php

include "../src/Emoji.php";

use Emoji\Emoji;

$str1 = "common";
$str2 = "chinese,中文";
$str3 = "mixed,中文,😘";
$str4 = "filter,mixed,中文,😝,中文,mixed,filter";

echo "str1 = ", $str1, PHP_EOL;
echo "encode str1 = ", $enStr1 = Emoji::Encode($str1), PHP_EOL;
echo "decode str1 = ", Emoji::Decode($enStr1), PHP_EOL;
echo PHP_EOL;
echo "str2 = ", $str2, PHP_EOL;
echo "encode str2 = ", $enStr2 = Emoji::Encode($str2), PHP_EOL;
echo "decode str2 = ", Emoji::Decode($enStr2), PHP_EOL;
echo PHP_EOL;
echo "str3 = ", $str3, PHP_EOL;
echo "encode str3 = ", $enStr3 = Emoji::Encode($str3), PHP_EOL;
echo "decode str3 = ", Emoji::Decode($enStr3), PHP_EOL;
echo PHP_EOL;
echo "str4 = ", $str4, PHP_EOL;
echo "encode and filter str4 = ", $enStr4 = Emoji::Encode($str4, true), PHP_EOL;
echo "decode str4 = ", Emoji::Decode($enStr4), PHP_EOL;