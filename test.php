<?php
$arr = [1, 2, 3, 4, 7, 8, 0, -2, -5, 8];

$largest = 0;
$secnondLargest = 0; 

for($i = 0; $i<count($arr); $i++){   
    if($largest < $arr[$i]) {
        $secnondLargest = $largest;
        $largest = $arr[$i];
    } else if($arr[$i] < $largest && $arr[$i] > $secnondLargest) {
        $secnondLargest = $arr[$i];
    }
}

echo $largest . "\n";
echo $secnondLargest . "\n";